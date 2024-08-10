<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function index() {
        return view('registrar');
    }

    public function store(Request $request){

        $usuario = new User;
        $usuario->usuario = $request->usuario;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('home');
    }
}
