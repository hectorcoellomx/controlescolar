<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = "students";

    public function list(){
        
        return $this->where('active', 1)
        ->orderBy('name')
        ->take(10)
        ->get();
        
    }

}
