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
            'id' => 'required|unique:students|max:20',
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
            return redirect('students?id=1');
        }else{
            return redirect('students/create')->with('nosave', 'No se ha podido guardar.');
        }

    }

    public function destroy(){
        return true;
    }

}
