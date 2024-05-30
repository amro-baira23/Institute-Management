<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //Add Subject Function
    public function addSubject(SubjectRequest $request)
    {
        Subject::create([
            'category_id' => $request->category_id,
            'subject' => $request->subject
        ]);

        return success(null, 'this subject added successfully', 201);
    }

    //Edit Subject Function
    public function editSubject(Subject $subject, SubjectRequest $request)
    {
        $subject->update([
            'category_id' => $request->category_id,
            'subject' => $request->subject
        ]);

        return success(null, 'this subject updated successfully');
    }

    //Get Subjects Function
    public function getSubjects()
    {
        $subjects = Subject::get();

        return success($subjects, null);
    }

    //Get Subject Information Function
    public function getSubjectInformation(Subject $subject)
    {
        return success($subject, null);
    }

    //Delete Subject Function
    public function deleteSubject(Subject $subject)
    {
        $subject->delete();

        return success(null, 'this subject deleted successfully');
    }
}