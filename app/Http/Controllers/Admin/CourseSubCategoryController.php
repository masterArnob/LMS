<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Http\Request;

class CourseSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCats = CourseSubCategory::with('category')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.course.sub-category.index', compact('subCats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = CourseCategory::where('status', 'active')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.course.sub-category.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'course_category_id' => ['required'],
            'status' => ['required']
        ]);

        $subCat = new CourseSubCategory();
        $subCat->name = $request->name;
        $subCat->slug = \Str::slug($request->name);
        $subCat->course_category_id = $request->course_category_id;
        $subCat->status = $request->status;
        $subCat->save();
        notyf()->success('Sub Category created successfully.');
        return to_route('admin.sub-category.index');
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
        $cats = CourseCategory::where('status', 'active')
        ->orderBy('id', 'DESC')
        ->get();
        $subCat = CourseSubCategory::findOrFail($id);
        return view('admin.course.sub-category.edit', compact('cats', 'subCat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'name' => ['required', 'string', 'unique:course_sub_categories,name,' . $id],
            'course_category_id' => ['required'],
            'status' => ['required']
        ]);

        $subCat = CourseSubCategory::findOrFail($id);
        $subCat->name = $request->name;
        $subCat->slug = \Str::slug($request->name);
        $subCat->course_category_id = $request->course_category_id;
        $subCat->status = $request->status;
        $subCat->save();
        notyf()->success('Sub Category updated successfully.');
        return to_route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $subCat = CourseSubCategory::findOrFail($id);
         $subCat->delete();
         notyf()->success('Sub Category deleted successfully.');
         return response(['status' => 'success']);
    }
}
