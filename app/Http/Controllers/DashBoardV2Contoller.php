<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardV2Controller extends Controller
{
    function show(){
        DB::table("transactions")
        ->join("courses", "courses.id", "=", "transactions.course_id")
        ->join("subjects", "susbjects.id", "=", "courses.subject_id");
    }
}
