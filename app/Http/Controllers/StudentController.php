<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Add Student Function
    public function addStudent(StudentRequest $studentRequest, PersonRequest $personRequest)
    {

        $person = Person::create([
            'name' => $personRequest->name,
            'father_name' => $personRequest->father_name,
            'phone_number' => $personRequest->phone_number,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'birth_date' => $personRequest->birth_date,
            'last_name' => $personRequest->last_name
        ]);

        Student::create([
            'person_id' => $person->id,
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
        $studentRequest->validate([
            'national_number' => 'required|unique:students,national_number,' . $student->id,
        ]);
        $student->person()->update([
            'name' => $personRequest->name,
            'father_name' => $personRequest->father_name,
            'phone_number' => $personRequest->phone_number,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'birth_date' => $personRequest->birth_date,
        ]);
        $student->update([
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

    //Get Students Function
    public function getStudents()
    {
        $students = Student::query()->when(request("name"),function($query,$name){
            return $query->where("name",$name);
        });

        return success($students->get(), null);
    
    }

    //Get Student Information Function
    public function getStudentInformation(Student $student)
    {
        return success($student->with('person')->find($student->id), null);
    }

    //Delete Student Function
    public function deleteStudent(Student $student)
    {
        $student->person->delete();
        $student->delete();

        return success(null, 'this student deleted successfully');
    }
}