<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index(){
        $career = new Career();
        $list = $career->list();
        return view('careers', [ 'careers' => $list ]);
    }
}
