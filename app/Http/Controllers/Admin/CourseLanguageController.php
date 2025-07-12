<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLanguage;
use Illuminate\Http\Request;

class CourseLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langs = CourseLanguage::orderBy('id', 'DESC')->get();
        return view('admin.course.course-language.index', compact('langs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.course-language.create');
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

        $lang = new CourseLanguage();
        $lang->name = $request->name;
        $lang->slug = \Str::slug($request->name);
        $lang->status = $request->status;
        $lang->save();
        notyf()->success('Language created successfully.');
        return to_route('admin.course-lang.index');
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
        $lang = CourseLanguage::findOrFail($id);
        return view('admin.course.course-language.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'name' => ['required', 'string', 'unique:course_languages,name,' . $id],
            'status' => ['required']
        ]);

        $lang =  CourseLanguage::findOrFail($id);
        $lang->name = $request->name;
        $lang->status = $request->status;
        $lang->save();
        notyf()->success('Language updated successfully.');
        return to_route('admin.course-lang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $lang =  CourseLanguage::findOrFail($id);
         $lang->delete();
         notyf()->success('Language deleted successfully.');
         return response(['status' => 'success']);
    }
}
