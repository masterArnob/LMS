<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLevel;
use Illuminate\Http\Request;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = CourseLevel::orderBy('id', 'DESC')->get();
        return view('admin.course.course-level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.course-level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required']
        ]);

        $level = new CourseLevel();
        $level->name = $request->name;
        $level->slug = \Str::slug($request->name);
        $level->status = $request->status;
        $level->save();
        notyf()->success('Level created successfully.');
        return to_route('admin.course-level.index');
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
        $level = CourseLevel::findOrFail($id);
        return view('admin.course.course-level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'name' => ['required', 'string', 'unique:course_levels,name,' . $id],
            'status' => ['required']
        ]);

        $level = CourseLevel::findOrFail($id);
        $level->name = $request->name;
        $level->slug = \Str::slug($request->name);
        $level->status = $request->status;
        $level->save();
        notyf()->success('Level updated successfully.');
        return to_route('admin.course-level.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $level =  CourseLevel::findOrFail($id);
         $level->delete();
         notyf()->success('Level deleted successfully.');
         return response(['status' => 'success']);
    }
}
