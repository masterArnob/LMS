<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
{
    public function myCourses(){
        $myCourses = Enrollment::where('user_id', Auth::user()->id)
            ->with(['course', 'course.instructor'])
            ->paginate(10);
        return view('student.my-courses.index', compact('myCourses'));
    }


    public function coursePlayer($slug){
     
        $course = Course::where('slug', $slug)->firstOrFail();
        $enrollment = Enrollment::where('user_id', Auth::user()->id)
            ->where('course_id', $course->id)
            ->first();
        if(!$enrollment) {
            abort(404, 'You are not enrolled in this course.');
        }

        return view('student.my-courses.course-player.index', compact('course'));
    }
}
