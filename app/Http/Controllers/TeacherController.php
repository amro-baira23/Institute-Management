<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherRetrieveResource;
use App\Models\Person;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //Add Teacher Function
    public function addTeacher(PersonRequest $personRequest, TeacherRequest $teacherRequest)
    {

        $teacher = Teacher::create([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'credentials' => $teacherRequest->credentials,
        ]);

        $teacher->subaccount()->create([
            "main_account" => "الأساتذة"
        ]);
        return success(null, 'this teacher added successfully', 201);
    }

    //Edit Teacher Function
    public function editTeacher(Teacher $teacher, PersonRequest $personRequest, TeacherRequest $teacherRequest)
    {

        $teacher->update([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'credentials' => $teacherRequest->credentials,
        ]);

        return success(null, 'this teacher edited successfully');
    }

    public function getNames()
    {
        $teachers = Teacher::when(request("name"), function ($query, $name) {
            return $query->where("name", "LIKE", '%' . $name . '%');
        })->get();
        
        return success(SimpleListResource::collection($teachers), null);
    }

    //Get Teachers Function
    public function getTeachers()
    {

        $teachers = Teacher::query()->when(request("name"), function ($query, $name) {
                return $query->where("name", "LIKE", '%' . $name . '%');
        })->when(request("phone_number"), function ($query, $name) {
                return $query->where("phone_number", "LIKE", '%' . $name . '%');
        })->paginate(20);


        return TeacherRetrieveResource::collection($teachers);
    }

    //Get Teacher Information Function
    public function getTeacherInformation(Teacher $teacher)
    {
        $teacher->load(["courses" => function ($query) {
            $query->orderBy("id", "desc")->take(3);
        }], "courses.subject");
        return success(new TeacherRetrieveResource($teacher), null);
    }

    //Delete Teacher Function
    public function deleteTeacher(Teacher $teacher)
    {
        $teacher->delete();

        return success(null, 'this teacher deleted successfully');
    }
}
