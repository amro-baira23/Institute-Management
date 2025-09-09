<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashBoardV2Controller extends Controller
{
  

    function show(){
        $revenue_data = DB::table("transactions")
        ->selectRaw("SUM(IF(type='E',amount,0)) - SUM(IF(type='P',amount,0)) as revenue, MONTH(created_at) as month")
        ->groupByRaw("MONTH(transactions.created_at)")
        ->orderBy("created_at","desc")
        ->limit(6)
        ->get();

        $revenue_data = $this->scale_collection($revenue_data,"revenue");

        $subjects_data = DB::table("enrollments")
        ->join("courses", "courses.id", "=", "enrollments.course_id")
        ->join("subjects", "subjects.id", "=", "courses.subject_id")
        ->join("categories", "categories.id", "=", "subjects.category_id")
        ->selectRaw("COUNT(enrollments.id) as students, categories.name as subject")
        ->groupByRaw("categories.name")
        ->orderBy("students","desc")
        ->limit(5)
        ->get();

        $subjects_data = $this->scale_collection($subjects_data,"students");

        $students_data = DB::table("enrollments")
        ->selectRaw("COUNT(enrollments.student_id) as count, MONTH(created_at) as month")
        ->groupByRaw("MONTH(enrollments.created_at)")
        ->orderBy("created_at","desc")
        ->limit(12)
        ->get();

        $students_data = $this->scale_collection($students_data,"count");
        
        $courses_data = DB::table("courses")
        ->selectRaw("COUNT(*) as courses, MONTH(courses.created_at) as month")
        ->groupByRaw("MONTH(courses.created_at)")
        ->orderBy("created_at","desc")
        ->limit(6)
        ->get();
        
        $courses_data = $this->scale_collection($courses_data,"courses");
        

        $data = [
            "revenues" => $revenue_data,
            "subjects" => $subjects_data,
            "students" => $students_data,
            "courses" => $courses_data,
        ];

        return $data;
    }

    private function scale_collection(Collection $collection,string $value_name){
        return $collection->map(function($item) use ($collection, $value_name){
            $item->scaled = (int) $this->calculate_scaled_value($item->$value_name,$collection->max($value_name),$collection->min($value_name));
            return $item;
        });
    }

    private function calculate_scaled_value(int $value,int $max,int $min)
    {
        $domain_range = $max - $min;
        if ($domain_range == 0)
            return 50;
        return ($value - $min) * 90 / $domain_range + 10;
    }
}
