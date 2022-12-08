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

    public function store(){
        return true;
    }

    public function destroy(){
        return true;
    }

}
