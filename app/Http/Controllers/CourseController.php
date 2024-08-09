<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\CourseTime;
use App\Models\DayOfWeek;
use App\Models\Schedule;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use App\Http\Controllers\Controller;
use App\Http\Resources\CurrentCoursesResource;
use App\Http\Resources\EnrollmentResource;
use App\Http\Resources\StudentCourseCollection;
use App\Http\Resources\StudentCourseResource;
use App\Http\Resources\StudentEnrolled;
use App\Models\ShoppingItem;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    //Add Course Function
    public function addCourse(CourseRequest $request)
    {
        $schedule = Schedule::create([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        $days = explode(',', $request->days);

        foreach ($days as $day)
            DayOfWeek::create([
                'schedule_id' => $schedule->id,
                'day' => $day,
            ]);

        Course::create([
            'subject_id' => $request->subject_id,
            'schedule_id' => $schedule->id,
            'teacher_id' => $request->teacher_id,
            'room_id' => $request->room_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'minimum_students' => $request->minimum_students,
            'salary_type' => $request->salary_type,
            'salary_amount' => $request->salary_amount,
            'cost' => $request->cost,
            'certificate_cost' => $request->certificate_cost,
            'status' => $request->status,
        ]);

        foreach ($request->lists as $list)
            ShoppingItem::create([
                'course_id' => $course->id,
                'item_id' => $list['item_id'],
                'amount' => $list['amount'],
                'per_student' => $list['per_student'],
        ]);

        return success(null, 'this course added successfully', 201);
    }


    //Edit Course Function
    public function editCourse(Course $course, CourseRequest $request)
    {
        $schedule = $course->schedule;
        $schedule->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
        $days = explode(',', $request->days);

        foreach ($course->schedule->days as $day)
            $day->delete();

        foreach ($days as $day)
            DayOfWeek::create([
                'schedule_id' => $course->schedule->id,
                'day' => $day,
            ]);

        $course->update([
            'subject_id' => $request->subject_id,
            'schedule_id' => $schedule->id,
            'teacher_id' => $request->teacher_id,
            'room_id' => $request->room_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'minimum_students' => $request->minimum_students,
            'salary_type' => $request->salary_type,
            'salary_amount' => $request->salary_amount,
            'cost' => $request->cost,
            'certificate_cost' => $request->certificate_cost,
            'status' => $request->status,
        ]);

        return success(null, 'this course updated successfully');
    }

    public function indexCourses()
    {
        $courses = Course::with('subject', 'schedule.days', 'teacher', 'room')
            ->when(request("status"), function ($query, $status) {
                return $query->where("status", $status);
            })
            ->when(request("subject"), function ($query, $value) {
                return $query->whereHas("subject", function ($query) use ($value) {
                    return $query->where("name", "LIKE", '%' . $value . '%');
                });
            })
            ->when(request("category"), function ($query, $value) {
                return $query->whereHas("subject", function ($query) use ($value) {
                    return $query->whereHas("category", function ($query) use ($value) {
                        return $query->where("name", "LIKE", '%' . $value . '%');
                    });
                });
            })
            ->when(request("room"), function ($query, $value) {
                return $query->whereHas("room", function ($query) use ($value) {
                    return $query->where("name", "LIKE", '%' . $value . '%');
                });
            })
            ->when(request("teacher"), function ($query, $value) {
                return $query->whereHas("teacher", function ($query) use ($value) {
                    return $query->where("name", "LIKE", '%' . $value . '%');
                });
            })
            ->when(request("start_at"), function ($query, $value) {
                return $query->where("start_at", '>', $value);
            })
            ->when(request("end_at"), function ($query, $value) {
                return $query->where("end_at", '<', $value);
            })
            ->paginate(20);
        return CurrentCoursesResource::collection($courses);
    }

    //Get Courses Function
    public function getCourses()
    {
        $courses = Course::with('subject', 'schedule.days', 'teacher', 'room')->whereNot("status", "C")
            ->where("end_at", ">", today())
            ->get();
        return success(CurrentCoursesResource::collection($courses), null);
    }

    //Get Course Information Function
    public function getCourseInformation(Course $course)
    {
        return success(new CurrentCoursesResource($course), null);
    }

    //Delete Course Function
    public function deleteCourse(Course $course)
    {
        $course->delete();

        return success(null, 'this course deleted successfully');
    }

    public function getStudents(Course $course)
    {
        return StudentEnrolled::collection($course->students);
    }

    public function reverseStudentEnrollmentType(Course $course, Student $student)
    {
        $enrollment = $student->pivot;
        $enrollment->update([
            "with_certificate" => (int) !$enrollment->with_certificate
        ]);
        return success(null, "enrollment with_certficate status been reversed successfuly");
    }


    public function deleteStudent(Course $course, Student $student)
    {
        $course->students()->detach($student);
        return success(null, "this student been detached successfuly", 204);
    }
}
