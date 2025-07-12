<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use File;
class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = CourseCategory::orderBy('id', 'DESC')->get();
        return view('admin.course.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required'],
            'show_at_trending' => ['required', 'in:yes,no'],
        ]);

        $cat = new CourseCategory();

             if ($request->has('image')) {
                 
                   
                    $file = $request->image;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/admin_images/'), $file_name);
                    $cat->image = '/uploads/admin_images/' . $file_name;
                }


        $cat->name = $request->name;
        $cat->slug = \Str::slug($request->name);
        $cat->icon = $request->icon;
        $cat->status = $request->status;
        $cat->show_at_trending = $request->show_at_trending;
        $cat->save();
        notyf()->success('Category created successfully.');
        return to_route('admin.category.index');
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
        $cat = CourseCategory::findOrFail($id);
        return view('admin.course.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request->all());
             $request->validate([
            'name' => ['required', 'string', 'unique:course_categories,name,' . $id],
            'status' => ['required'],
            'show_at_trending' => ['required', 'in:yes,no'],
        ]);

        $cat =  CourseCategory::findOrFail($id);

             if ($request->has('image')) {
                 
                   if(File::exists(public_path($cat->image))) {
                        File::delete(public_path($cat->image));
                    }
                    $file = $request->image;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/admin_images/'), $file_name);
                    $cat->image = '/uploads/admin_images/' . $file_name;
                }


        $cat->name = $request->name;
        $cat->icon = $request->icon;
        $cat->slug = \Str::slug($request->name);
        $cat->status = $request->status;
        $cat->show_at_trending = $request->show_at_trending;
        $cat->save();
        notyf()->success('Category updated successfully.');
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $cat =  CourseCategory::findOrFail($id);
          if(File::exists(public_path($cat->image))) {
                        File::delete(public_path($cat->image));
                }
         $cat->delete();
         notyf()->success('Category deleted successfully.');
         return response(['status' => 'success']);
    }
}
