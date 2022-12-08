<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class AuthController extends Controller
{   
    // Formulario de login
    public function index(){
        return view('login');
    }

    // Logueo
    public function login(Request $request){
        
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = new Admin();
        $access = $admin->login($email, $password);

        if($access){
            return redirect('home');
        }else{
            return redirect('login')->with('noaccess', 'Usuario o contraseña inválidos.');
        }

    }

    // Cierra la sesión
    public function logout(){
        return redirect('login');
    }
}
