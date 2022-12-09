<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {

        $status_code = 200;

        $career = new Career();
        $list = $career->list();

        $data = array('success' => true, 'message' => '', 'data' => $list);
        return response()->json($data, $status_code);
    }

    public function update(Request $request, $id)
    {

        $description = $request->input('description');

        if($description==null){
            $data = array( 'error_code' => null, 'message' => 'Debe enviar una descripción' );
            return response()->json($data, 400);
            exit;
        }

        $career = Career::find($id);

        if ($career != null) {
            $career->description = $description;
            $update = $career->save();
        }else{
            $update = false;
        }


        $data = array('success' => true, 'message' => '', 'data' => $update);
        return response()->json($data, 200);
    }
}
