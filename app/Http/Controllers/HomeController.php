<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
    public function index(){
        //$student = new Student();
        //echo $student->list();
        return view('home');
    }
}
