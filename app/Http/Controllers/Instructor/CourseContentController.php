<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseContentController extends Controller
{
    public function createChapter(Request $request){
        $course = Course::findOrFail($request->course_id);
        return view('instructor.course.partials.course-content-add-chapter', compact('course'))->render();
    }


    public function storeChapter(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $chapter = new CourseChapter();
        $chapter->title = $request->title;
        $chapter->instructor_id = Auth::user()->id;
        $chapter->course_id = $request->course_id;
        $chapter->order = CourseChapter::where('course_id', $request->course_id)->count() + 1;
        $chapter->save();
        return redirect()->back();
    }
}
