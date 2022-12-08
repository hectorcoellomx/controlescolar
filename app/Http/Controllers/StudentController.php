<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $student = new Student();
        $list = $student->list();
        return view('students', [ 'students' => $list ]);
    }

    public function create(){
        return view('students_create');
    }

    public function store(Request $request){

        $request->validate([
            'id' => 'required|integer|unique:students',
            'name' => 'required|max:200',
            'lastname' => 'required',
            'email' => 'required|email',
            'gender' => 'required|in:m,f',
            'career_id' => 'required|integer'
        ]);

        $student = new Student();
        $student->id = $request->id;
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->career_id = $request->career_id;
        $create = $student->create();

        if($create=="done"){
            return redirect('students');
        }else{
            return redirect('students/create')->with('nosave', 'No se ha podido guardar.');
        }

    }

    public function destroy(Request $request){

        $request->validate([
            'id' => 'required'
        ]);

        $student = new Student();
        $res = $student->deletes($request->id);
        
        if($res=="done"){
            return redirect('students');
        } else {
            return redirect('students')->with('nodelete', 'No se ha podido eliminar.');
        }
    }

}
