<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
// use App\Helpers\Ldap;

class AuthController extends Controller
{   

    public function index(Request $request){
        
        if($request->session()->has('user')){
            return redirect('home');
        }

        return view('login');
    }

    public function login(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        //$ldap = new Ldap();
        //$login = $ldap->login($email, $password);  

        //if($login['valido']=='1'){
            
            $admin = new Admin();
            $access = $admin->login($email, $password);
    
            if($access){
                session(['user' => array('email' => $email) ]);
                return redirect('home');
            }else{
                return redirect('login')->with('noaccess', 'No tiene acceso a este sistema.');
            }

        /* }else{
                return redirect('login')->with('noaccess', 'Usuario o contraseña inválidos.');
        } */
        

    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('login');
    }
}
