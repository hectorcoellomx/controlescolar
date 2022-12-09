<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index(){

        $status_code = 200;
        
        $data = array(
            'success' => true,
            'message' => '',
            'data' => null
        );


        return response()->json($data,$status_code);
    }
}
