<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class AuthController extends Controller
{   
    // Formulario de login
    public function index(Request $request){
        
        if($request->session()->has('user')){
            return redirect('home');
        }

        return view('login');
    }

    // Logueo
    public function login(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin = new Admin();
        $access = $admin->login($email, $password);

        if($access){
            session(['user' => array('email' => $email) ]);
            return redirect('home');
        }else{
            return redirect('login')->with('noaccess', 'Usuario o contraseña inválidos.');
        }

    }

    // Cierra la sesión
    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('login');
    }
}
