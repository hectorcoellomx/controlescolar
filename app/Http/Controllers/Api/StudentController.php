<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function list($id){ 

        $student = new Student();
        $list = $student->list_by_career($id);
        $data = array('success' => true, 'message' => '', 'data' => $list);
        return response()->json($data, 200);
    }
    
    public function store(){ 
        $store = true;
        $data = array('success' => true, 'message' => '', 'data' => $store);
        return response()->json($data, 200);
    }
    
    public function destroy($id){ 
        
        $student = Student::find($id);
        $delete = $student->delete();

        $data = array('success' => true, 'message' => '', 'data' => $delete);
        return response()->json($data, 200);

    }

}
