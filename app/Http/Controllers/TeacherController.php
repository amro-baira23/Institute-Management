<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\TeacherRequest;
use App\Models\Person;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //Add Teacher Function
    public function addTeacher(PersonRequest $personRequest, TeacherRequest $teacherRequest)
    {
        $person = Person::create([
            'name' => $personRequest->name,
            'last_name' => $personRequest->last_name,
            'father_name' => $personRequest->father_name,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'type' => 'T',
        ]);

        Teacher::create([
            'person_id' => $person->id,
            'credentials' => $teacherRequest->credentials,
            'salary_type' => $teacherRequest->salary_type,
            'salary_amount' => $teacherRequest->salary_amount,
        ]);

        return success(null, 'this teacher added successfully', 201);
    }

    //Edit Teacher Function
    public function editTeacher(Teacher $teacher, PersonRequest $personRequest, TeacherRequest $teacherRequest)
    {
        $teacher->person()->update([
            'name' => $personRequest->name,
            'last_name' => $personRequest->last_name,
            'father_name' => $personRequest->father_name,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
        ]);

        $teacher->update([
            'credentials' => $teacherRequest->credentials,
            'salary_type' => $teacherRequest->salary_type,
            'salary_amount' => $teacherRequest->salary_amount,
        ]);

        return success(null, 'this teacher edited successfully');
    }

    //Get Teachers Function
    public function getTeachers()
    {
        $teachers = Teacher::with('person')->get();

        return success($teachers, null);
    }

    //Get Teacher Information Function
    public function getTeacherInformation(Teacher $teacher)
    {
        return success($teacher->with('person')->find($teacher->id), null);
    }

    //Delete Teacher Function
    public function deleteTeacher(Teacher $teacher)
    {
        $teacher->delete();

        return success(null, 'this teacher deleted successfully');
    }
}
