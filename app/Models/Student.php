<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    public function list(){

        return DB::table('students')
            ->join('careers', 'students.career_id', '=', 'careers.id')
            ->select('students.*', 'careers.description')
            ->get();
        
    }

    public function list_by_career($id){
        
        return DB::table('students')
            ->where('career_id', $id)
            ->select('students.*')
            ->get();
        
    }


    public function create(){
        try {
            $this->save();
            return "done";
        } catch (\Throwable $th) {
            return "error";
        }
        
    }

}
