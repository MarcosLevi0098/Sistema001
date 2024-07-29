<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            
        ],
        [
            'email/required' =>'O campo email é obrigatório!',
            'email/email' => 'O campo email não é valido!',
            'password/required'=>'O campo senha é obrigatório!',
            'password/password' => 'O campo senha não é valido!'
        ]
    );
        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->with('erro', 'Usuario ou senha incorreto');
        }
    }
}
