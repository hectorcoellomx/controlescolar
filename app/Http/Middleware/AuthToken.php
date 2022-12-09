<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Helpers\TokenAuth;

class AuthToken
{

    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        $token = ( $token!=null ) ? $token : $request->input('token');

        $tAuth = new TokenAuth();
        $validate = $tAuth->validate($token);

        if (!$validate['success']) {
            $error_code = ( $validate['detail'] == '0000' ) ? 1 : ( ( $validate['detail'] == '1101' ) ? 4 : 2 );
            return response()->json( array( 'error_code' => $error_code, 'message' => $validate['detail'] ) , 401);
            exit;

        }

        return $next($request);
    }
}
