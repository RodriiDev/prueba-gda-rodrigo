<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomersLog;
use App\Models\Region;
use App\Models\Commune;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
  
    public function index(){

        $customers = Customer::select('customers.name','customers.last_name','customers.address','customers.dni')
        ->selectRaw('t1.description as strRegion')
        ->selectRaw('t2.description as strCommune')
        ->join('regions as t1','customers.id_reg','=','t1.id_reg')
        ->join('communes as t2','customers.id_com','=','t2.id_com')
        ->where('customers.status','=','A')->get();

        if (Auth::check()) {

            $token = Auth::user()->tokens->first();

            if ($token->expires_at->isPast()) {
                $token->delete(); // Elimina el token si ha expirado
                auth()->logout(); // Se hace logout
                return view('home')->with('mensaje','Sesión expirada');
            }
            else{

                $success = ($customers) ? 'true' : 'false';

                return view('customer',[
                    'customers' => $customers,
                    'success' => $success
                ]);            
            }
            
        }

        else{
            return view('home')->with('mensaje','Necesitas iniciar sesión');
        }
        
    }

    public function create(){

        $regions = Region::where('status','=','A')->get();
        $communes = Commune::where('status','=','A')->get();

        if (Auth::check()) {

            $token = Auth::user()->tokens->first();

            if ($token->expires_at->isPast()) {
                $token->delete(); // Elimina el token si ha expirado
                auth()->logout(); // Se hace logout
                return view('home')->with('mensaje','Sesión expirada');
            }
            else{

                $success = ($regions) ? 'true' : 'false';

                //Entra a view de alta customer
                return view('altaCustomer',[
                    'regions' => $regions,
                    'communes' => $communes,
                    'success' => $success
                ]);         
            }
            
        }

        else{
            return view('home')->with('mensaje','Necesitas iniciar sesión');
        }


    }

    public function store(Request $request){

        if (Auth::check()) {

            $token = Auth::user()->tokens->first();

            if ($token->expires_at->isPast()) {
                $token->delete(); // Elimina el token si ha expirado
                auth()->logout(); // Se hace logout
                return view('home')->with('mensaje','Sesión expirada');
            }
            else{
                //Se guarda customer
                $customer = new Customer;
                $customer->dni = $request->dni;
                $customer->id_reg = $request->region;
                $customer->id_com = $request->commune;
                $customer->email = $request->email;
                $customer->name = $request->nombre;
                $customer->last_name = $request->last_name;
                $customer->address = $request->address;
                $customer->date_reg = Carbon::now();
                $customer->status = 'A';
                $customer->save();

                //Se guarda en log
                $log = new CustomersLog;
                $log->dni = $request->dni;
                $log->name_customer = $request->nombre;
                $log->tipo = 'Entrada';
                $log->ip = $request->ip();
                $log->date = Carbon::now();
                $log->save();


                $success = ($customer) ? 'true' : 'false';

                return redirect()->route('customer.index', ['success' => $success]);          
            }
            
        }
        
    }

    public function destroy($id, Request $request){

        if (Auth::check()) {

            $token = Auth::user()->tokens->first();

            if ($token->expires_at->isPast()) {
                $token->delete(); // Elimina el token si ha expirado
                auth()->logout(); // Se hace logout
                return view('home')->with('mensaje','Sesión expirada');
            }
            else{
                //Se hace soft delete
                $customer = Customer::where('dni',$id);
                $customer2 = Customer::where('dni',$id)->first();

                //Se guarda en log solo si esta en produccion
                if (env('SAVE_LOGS', true)) {
                    $log = new CustomersLog;
                    $log->dni = $id;
                    $log->name_customer = $customer2->name;
                    $log->tipo = 'Salida';
                    $log->ip = $request->ip();
                    $log->date = Carbon::now();
                    $log->save();
                }

                $customer->delete();

                $success = ($customer) ? 'true' : 'false';

                return redirect()->route('customer.index', ['success' => $success]);          
            }
            
        }
    }

    public function search(Request $request){

        $customers = Customer::select('customers.name','customers.last_name','customers.address','customers.dni')
        ->selectRaw('t1.description as strRegion')
        ->selectRaw('t2.description as strCommune')
        ->join('regions as t1','customers.id_reg','=','t1.id_reg')
        ->join('communes as t2','customers.id_com','=','t2.id_com')
        ->where('dni','like',"%{$request->dni}%")
        ->where('email','like',"%{$request->emailsearch}%")
        ->where('customers.status','=','A')->get();

        $success = ($customers) ? 'true' : 'false';

        return view('customer',[
            'customers' => $customers,
            'success' => $success
        ]);  

    }

}