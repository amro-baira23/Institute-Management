<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
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
        $person = Person::create([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
        ]);

        Student::create([
            'person_id' => $person->id,
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

        return success(null, 'this student added successfully', 201);
    }

    //Edit Student Function
    public function editStudent(Student $student, StudentRequest $studentRequest, PersonRequest $personRequest)
    {
        
        $student->person()->update([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
        ]);
        $student->update([
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
        $students = Student::query()->when(request("name"),function($query,$name){
            return $query->whereHas("person",function($query,) use($name){
                return $query->where("name","LIKE", '%'.$name.'%');
            });
        })->with("person")->paginate(20);
        return success(SimpleListResource::collection($students),null);
    }

    
    //Get Students Function
    public function getStudents()
    {
        $students = Student::query()->when(request("name"),function($query,$name){
            return $query->whereHas("person",function($query,) use($name){
                return $query->where("name","LIKE", '%'.$name.'%');
            });
        })->with("person")->paginate(20);
        return new StudentCollection($students);
    
    }

    //Get Student Information Function
    public function getStudentInformation(Student $student)
    {
        $student->load("person");
        $r = new StudentResource(["id" => 1,"name" => "amro"]);
        unset($r->resource["name"]);
        return success($r->resource, null);
    }

    //Delete Student Function
    public function deleteStudent(Student $student)
    {
        $student->person->delete();
        $student->delete();

        return success(null, 'this student deleted successfully');
    }
}
