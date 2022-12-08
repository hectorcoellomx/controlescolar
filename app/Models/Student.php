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
        
        //return $this->where('active', 1)->get();

        return DB::table('students')
            ->join('careers', 'students.career_id', '=', 'careers.id')
            ->select('students.*', 'careers.description')
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

    public function deletes($id){
        return $this->where('id', $id)->delete();
    }

}
