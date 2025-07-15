<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        return view('instructor.course.index');
    }


    public function create(){
        return view('instructor.course.create');
    }


    public function storeBasicInfo(Request $request){
       // dd($request->all());
        $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'seo_description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'discount' => ['nullable', 'numeric'],
        ]);

        $course = new Course();

               if ($request->has('thumbnail')) {
                    $file = $request->thumbnail;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/instructor_images/'), $file_name);
                    $course->thumbnail = '/uploads/instructor_images/' . $file_name;
                }

                $source = null;
                if($request->demo_video_storage === 'upload'){
                    $source = $request->path;
                }else{
                    $source = $request->url;
                }
                //dd($source);

        $course->instructor_id = Auth::user()->id;
        $course->title = $request->title;
        $course->slug = \Str::slug($request->title);
        $course->seo_description = $request->seo_description;
        $course->demo_video_storage = $request->demo_video_storage;
        $course->demo_video_source = $source;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->is_approved = 'pending';
        $course->save();
        return response(['status' => 'success', 'message' => 'Course basic information saved successfully.']);
    }
}
