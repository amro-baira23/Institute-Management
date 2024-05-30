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

class CourseController extends Controller
{
    //Add Course Function
    public function addCourse(CourseRequest $request)
    {
        $schedule = Schedule::create();

        $days = explode(',', $request->days);

        $courses = Course::get();

        foreach ($courses as $course) {
            foreach ($course->schedule->days as $course_day) {
                foreach ($days as $day) {
                    if ($day == $course_day->day && $request->start >= $course->schedule->time->start && $request->start < $course->schedule->time->end && $request->start_at >= $course->start_at && $request->start_at <= $course->end_at && $course->room_id == $request->room_id) {
                        return error('You cannot set course time in this days', 'You cannot set course time in this days', 502);
                    }
                }
            }
        }

        CourseTime::create([
            'schedule_id' => $schedule->id,
            'start' => $request->start,
            'end' => $request->end,
        ]);

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
            'status' => $request->status,
        ]);

        return success(null, 'this course added successfully', 201);
    }

    //Edit Course Function
    public function editCourse(Course $course, CourseRequest $request)
    {
        $schedule = Schedule::create();

        $days = explode(',', $request->days);

        $courses = Course::whereNot('id', $course->id)->get();

        foreach ($courses as $c) {
            foreach ($c->schedule->days as $course_day) {
                foreach ($days as $day) {
                    if ($day == $course_day->day && $request->start >= $c->schedule->time->start && $request->start < $c->schedule->time->end && $request->start_at >= $c->start_at && $request->start_at <= $c->end_at && $c->room_id == $request->room_id) {
                        return error('You cannot set course time in this days', 'You cannot set course time in this days', 502);
                    }
                }
            }
        }

        $course->schedule->time->update([
            'schedule_id' => $schedule->id,
            'start' => $request->start,
            'end' => $request->end,
        ]);

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
            'status' => $request->status,
        ]);

        return success(null, 'this course updated successfully');
    }

    //Get Courses Function
    public function getCourses()
    {
        $courses = Course::with('subject', 'schedule', 'teacher', 'room')->get();
        return success($courses, null);
    }

    //Get Course Information Function
    public function getCourseInformation(Course $course)
    {
        $course = $course->with('subject', 'schedule', 'teacher', 'room')->find($course->id);
        $course->schedule->time;
        $course->schedule->days;
        return success($course, null);
    }

    //Delete Course Function
    public function deleteCourse(Course $course)
    {
        $course->delete();

        return success(null, 'this course deleted successfully');
    }
}
