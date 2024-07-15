<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Http\Resources\SimpleListResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //Add Subject Function
    public function addSubject(SubjectRequest $request)
    {
        Subject::create([
            'category_id' => $request->category_id,
            'name' => $request->subject
        ]);

        return success(null, 'this subject added successfully', 201);
    }

    //Edit Subject Function
    public function editSubject(Subject $subject, SubjectRequest $request)
    {
        $subject->update([
            'category_id' => $request->category_id,
            'name' => $request->subject
        ]);

        return success(null, 'this subject updated successfully');
    }

    //Get Subjects Function
    public function getSubjects(Request $request)
    {
        $subjects = Subject::with("category")->when(request("name"),function($query,$name){
            return $query->where("name","LIKE","%".$name."%");
        })->paginate(20);
        return SimpleListResource::collection($subjects);
    }

    //Get Subject Information Function
    public function getSubjectInformation(Subject $subject)
    {
        return success(new SimpleListResource($subject) , null);
    }

    //Delete Subject Function
    public function deleteSubject(Subject $subject)
    {
        $subject->delete();

        return success(null, 'this subject deleted successfully');
    }
}