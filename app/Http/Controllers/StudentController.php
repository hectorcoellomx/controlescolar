<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('students');
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
