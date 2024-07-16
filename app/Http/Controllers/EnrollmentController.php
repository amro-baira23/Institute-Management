<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnrollmentResource;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{

    
    public function index()
    {
        $enrollments = Enrollment::with("course","student")->orderBy("created_at","desc")->paginate(20);
        return  EnrollmentResource::collection($enrollments);
    }


    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "student_id" => ["required",Rule::exists("students","id")->withoutTrashed(),Rule::unique("enrollments","student_id")->where("course_id",$request->course_id)],
            "with_certificate" => ["required","bool"],
            "course_id" => ["required",Rule::exists("courses","id")],
        ],[
            "required" => "هذا الحقل مطلوب",
            "unique" => "هذا الطالب مسجل بالفغل بهذه الدورة",
            "course_id.exists" => "معرف هذه الدورة غير موجود في قاعدة البيانات",
            "student_id.exists" => "معرف هذا الطالب غير موجود في قاعدة البيانات",
        ])->validate();
        
        $enrollment = Enrollment::create([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
            "with_certificate" => $request->with_certificate,
        ]);
        
       
        return success(new EnrollmentResource($enrollment),"enrollement been creatd successfuly",201);
    }

   
    public function update(Enrollment $enrollment,Request $request)
    {
        Validator::make($request->all(),[
            "student_id" => ["required",Rule::exists("students","id")->withoutTrashed(),
            Rule::unique("enrollments","student_id")->ignore($enrollment)],

            "with_certificate" => ["required","bool"],
            "course_id" => ["required",Rule::exists("courses","id")],
        ],[
            "required" => "هذا الحقل مطلوب",
            "unique" => "هذا الطالب مسجل بالفغل بهذه الدورة",
            "course_id.exists" => "معرف هذه الدورة غير موجود في قاعدة البيانات",
            "student_id.exists" => "معرف هذا الطالب غير موجود في قاعدة البيانات",
        ])->validate();
        $enrollment->update([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
            "with_certificate" => (int) $request->with_certificate,
        ]);
        return success(new EnrollmentResource($enrollment),"enrollement been updated successfuly",201);

    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return success(null,null,204);      
    }
}
