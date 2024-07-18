<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\CourseSimpleListResource;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Course;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Add Student Function
    public function addStudent(StudentRequest $studentRequest, PersonRequest $personRequest)
    {
        $studentRequest->validate([
            'national_number' => 'unique:students,national_number',
        ]);


        $student = Student::create([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'father_name' => $personRequest->father_name,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'name_en' => $studentRequest->name_en,
            'father_name_en' => $studentRequest->father_name_en,
            'line_phone_number' => $studentRequest->line_phone_number,
            'mother_name_en' => $studentRequest->mother_name_en,
            'national_number' => $studentRequest->national_number,
            'nationality' => $studentRequest->nationality,
            'education_level' => $studentRequest->education_level,
        ]);

        $student->subaccount()->create([
            "main_account" => "الطلاب"
        ]);
        
        return success(null, 'this student added successfully', 201);
    }

    //Edit Student Function
    public function editStudent(Student $student, StudentRequest $studentRequest, PersonRequest $personRequest)
    {

        $student->update([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'father_name' => $personRequest->father_name,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'name_en' => $studentRequest->name_en,
            'father_name_en' => $studentRequest->father_name_en,
            'line_phone_number' => $studentRequest->line_phone_number,
            'mother_name_en' => $studentRequest->mother_name_en,
            'national_number' => $studentRequest->national_number,
            'nationality' => $studentRequest->nationality,
            'education_level' => $studentRequest->education_level,
        ]);

        return success(null, 'this student updated successfully');
    }
    public function getNames()
    {
        $students = Student::query()->when(request("name"), function ($query, $name) {
            return $query->where("name", "LIKE", '%' . $name . '%')
                ->orWhere("name_en", "LIKE", '%' . $name . '%');
        })->paginate(20);
        return success(SimpleListResource::collection($students), null);
    }


    //Get Students Function
    public function getStudents()
{
        $students = Student::query()->when(request("name"), function ($query, $name) {
            return $query->where("name", "LIKE", '%' . $name . '%');
        })->when(request("name_en"), function ($query, $name_en) {
            return $query->where("name_en", "LIKE", '%' . $name_en . '%');
        })->when(request("father_name"), function ($query, $father_name) {
            return $query->where("father_name", "LIKE", '%' . $father_name . '%');
        })->when(request("mother_name"), function ($query, $mother_name) {
            return $query->where("mother_name", "LIKE", '%' . $mother_name . '%');
        })->when(request("phone_number"), function ($query, $var) {
                return $query->where("phone_number", "LIKE", '%' . $var . '%');
        })->when(request("education_level"), function ($query, $var) {
            return $query->where("education_level", "LIKE", '%' . $var . '%');
        })->when(request("line_number"), function ($query, $var) {
            return $query->where("line_phone_number", "LIKE", '%' . $var . '%');
        })->when(request("national_number"), function ($query, $var) {
            return $query->where("national_number", "LIKE", '%' . $var . '%');
        })->paginate(20);
        return new StudentCollection($students);
    }

    //Get Student Information Function
    public function getStudentInformation(Student $student)
    {
        return success(new StudentResource($student), null);
    }

    //Delete Student Function
    public function deleteStudent(Student $student)
    {
        $student->delete();
        return success(null, 'this student deleted successfully');
    }

    public function getCourses(Student $student)
    {
        $courses = $student->courses()->get();
        return (CourseSimpleListResource::collection($courses));
    }

}
