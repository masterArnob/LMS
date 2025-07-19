<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('instructor')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.course.course-module.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with('instructor')->findOrFail($id);
        return view('admin.course.course-module.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        $course->is_approved = $request->is_approved;
        $course->save();
        notyf()->success('Course approval status updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $chapters = CourseChapter::where('course_id', $course->id)->get();
        foreach ($chapters as $chapter) {
            $lessons = $chapter->lessons;
            foreach ($lessons as $lesson) {
                $lesson->delete();
            }
            $chapter->delete();
        }
        $course->delete();
        notyf()->success('Course deleted successfully.');
        return response(['status' => 'success', 'message' => 'Course deleted successfully.']);
    }
}
