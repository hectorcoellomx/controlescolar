<?php

namespace App\Http\Controllers;

use App\Models\Career;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        $career = new Career();
        $list = $career->list();
        return view('careers', [ 'careers' => $list ]);
    }
}
