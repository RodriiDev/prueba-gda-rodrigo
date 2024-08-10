<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
  
    public function index(){
        return view('home');
    }

    public function store(Request $request){

        // Almacenamos las credenciales de usuario y password
	    $credentials = $request->only('usuario', 'password');
	
	    // Si el usuario existe lo logeamos
	    if (Auth::attempt($credentials)) {

            $user = User::where('usuario', $request['usuario'])->firstOrFail();
	        
            //Creamos token (aqui se le puede cambiar la duración de vida)
            $token = $user->createToken('auth_token',['*'],now()->addMinutes(20))->plainTextToken;

            return redirect()->route('home', auth()->user()->username);

            /* return response()->json([
                'access_token' => $token,
            ]); */

	    }
        else{
            return view('home')->with('mensaje','Credenciales Incorrectas');
        }

    }


    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        auth()->logout();


        return redirect()->route('home');

    }
}