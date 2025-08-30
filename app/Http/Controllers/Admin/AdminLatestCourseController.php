<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\LatestCourse;
use Illuminate\Http\Request;

class AdminLatestCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::where('status', 'active')->get();
        $latest = LatestCourse::first();
        return view('admin.course.latest-course.index', compact('categories', 'latest'));
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
        $data = $request->validate([
            'category_one' => 'required|exists:course_categories,id',
            'category_two' => 'nullable|exists:course_categories,id',
            'category_three' => 'nullable|exists:course_categories,id',
            'category_four' => 'nullable|exists:course_categories,id',
            'category_five' => 'nullable|exists:course_categories,id',
        ]);

       // dd($data);
        LatestCourse::updateOrCreate(
            ['id' => 1],
            $data
        );

        notyf()->success('Latest Course updated successfully.');
        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
