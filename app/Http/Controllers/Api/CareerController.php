<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index(){

        $status_code = 200;
        
        $career = new Career();
        $list = $career->list();

        $data = array(
            'success' => true,
            'message' => '',
            'data' => $list
        );

        return response()->json($data, $status_code);
    }
}
