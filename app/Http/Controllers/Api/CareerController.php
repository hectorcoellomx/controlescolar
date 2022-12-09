<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;

use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        $career = new Career();
        $list = $career->list();

        $data = array('success' => true, 'message' => '', 'data' => $list);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ]);
 
        if ($validator->fails()) {
            //return redirect('post/create')->withErrors($validator)->withInput();
            $data = array( 'error_code' => null, 'message' => 'Debe enviar una descripciónnn' );
            return response()->json($data, 400);
            exit;
        }

        $description = $request->input('description');

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
