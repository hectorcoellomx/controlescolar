<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Helpers\TokenAuth;

class AuthController extends Controller
{
    private $keyApp= 'secret-key-for-app';

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = new Admin();
        $access = $admin->login($email, $password);

        $status_code = 200;

        if ($access) {

            $tAuth = new TokenAuth();
            $tk = $tAuth->generate(100, $email, "", 0.5); // 30 min
            $tAuth->set_key($this->keyApp);
            $tk_sesion = $tAuth->generate(100, $email, "", 1440); // 2 months 

            $data = array(
                'success' => true,
                'message' => 'ok',
                'data' => array(
                    'id' => 100,
                    'nombre' => 'Jonh Doe',
                    'email' => $email,
                    'tk' => $tk,
                    'tk_sesion' => $tk_sesion
                )
            );

        } else {

            $status_code = 401;

            $data = array(
                'error_code' => null,
                'message' => 'Credenciales no válidas'
            );
        }

        return response()->json($data, $status_code);
    }
}
