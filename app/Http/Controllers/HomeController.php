<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(Request $request){

        if (Auth::check()) {

            $token = Auth::user()->tokens->first();

            if ($token->expires_at->isPast()) {
                $token->delete(); // Elimina el token si ha expirado
                auth()->logout(); // Se hace logout
            }
            
        }

        return view('home');

    }
}
