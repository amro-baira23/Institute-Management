<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Add Student Function
    public function addStudent(StudentRequest $request)
    {
        $request->validate([
            'national_number'=>'unique:students,national_number'
        ]);
        Student::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'father_name_ar' => $request->father_name_ar,
            'father_name_en' => $request->father_name_en,
            'mobile_phone_number' => $request->mobile_phone_number,
            'line_phone_number' => $request->line_phone_number,
            'mother_name_ar' => $request->mother_name_ar,
            'mother_name_en' => $request->mother_name_en,
            'national_number' => $request->national_number,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'education_level' => $request->education_level,
        ]);

        return success(null, 'this student added successfully', 201);
    }

    //Edit Student Function
    public function editStudent(Student $student, StudentRequest $request)
    {
        $request->validate([
            'national_number' => 'required|unique:students,national_number,'.$student->id,
        ]);
        $student->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'father_name_ar' => $request->father_name_ar,
            'father_name_en' => $request->father_name_en,
            'mobile_phone_number' => $request->mobile_phone_number,
            'line_phone_number' => $request->line_phone_number,
            'mother_name_ar' => $request->mother_name_ar,
            'mother_name_en' => $request->mother_name_en,
            'national_number' => $request->national_number,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'education_level' => $request->education_level,
        ]);

        return success(null, 'this student updated successfully');
    }

    //Get Students Function
    public function getStudents()
    {
        $students = Student::get();

        return success($students, null);
    }

    //Get Student Information Function
    public function getStudentInformation(Student $student)
    {
        return success($student, null);
    }

    //Delete Student Function
    public function deleteStudent(Student $student){
        $student->delete();

        return success(null,'this student deleted successfully');
    }
}