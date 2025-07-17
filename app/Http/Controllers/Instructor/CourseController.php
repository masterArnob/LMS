<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;
class CourseController extends Controller
{
    public function index(){
        $courses = Course::where(['instructor_id' => Auth::user()->id])
        ->orderBy('id', 'DESC')
        ->get();
        return view('instructor.course.index', compact('courses'));
    }


    public function create(){
        return view('instructor.course.basic');
    }


    public function storeBasicInfo(Request $request){
       //dd($request->all());
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


        Session::put('course_id', $course->id);

        return response([
        'status' => 'success',
        'message' => 'Course basic information saved successfully.', 
        'redirect_route' => route('instructor.course.edit', ['course_id' => $course->id, 'step' => $request->next_step])
    ]);
    }



    public function edit(Request $request){
       switch($request->step){
        case '1':
           // return 'this is case 1 edit page';
           $course = Course::findOrFail($request->course_id);
            return view('instructor.course.edit', compact('course'));
            break;
        case '2':
           // return 'this iis more info';
           $cats = CourseCategory::where('status', 'active')->orderBy('name', 'ASC')->get();
           $langs = CourseLanguage::where('status', 'active')->orderby('name', 'ASC')->get();
           $levels = CourseLevel::where('status', 'active')->orderBy('id', 'ASC')->get();
           return view('instructor.course.more-info', compact('cats', 'langs', 'levels'));
            break;
        case '3':
            return 'this is case 3 edit page';
            break;
        case '4':
            return 'this is case 4 edit page';
            break;
        default:
            return 'this is default case edit page';
            break;
       }
    }



    public function update(Request $request){
        switch($request->current_step){
            case '1':
                //return 'this is case 1 for update';
            $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'seo_description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'discount' => ['nullable', 'numeric'],
        ]);

        $course = Course::findOrFail($request->course_id);

               if ($request->has('thumbnail')) {
                if(File::exists(public_path($request->thumbnail))){
                    File::delete(public_path($request->thumbnail));
                }
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

    
        $course->title = $request->title;
        $course->slug = \Str::slug($request->title);
        $course->seo_description = $request->seo_description;
        $course->demo_video_storage = $request->demo_video_storage;
        $course->demo_video_source = $source;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->save();



        return response([
        'status' => 'success',
        'message' => 'Course basic information saved successfully.', 
        'redirect_route' => route('instructor.course.edit', ['course_id' => $course->id, 'step' => $request->next_step])
    ]);
                break;
            case '2':
                //return 'this is case 2 for update';
               // dd($request->all());
                $request->validate([
                    'capacity' => ['required', 'numeric'],
                    'duration' => ['required', 'numeric'],
                    'category_id' => ['required'],
                    'language_id' => ['required', 'exists:course_languages,id'],
                    'level_id' => ['required', 'exists:course_levels,id'],
                    'qna' => ['nullable', 'boolean'],
                    'certificate' => ['nullable', 'boolean'],
                ]);
                $course_id = Session::get('course_id');
                $course = Course::findOrFail($course_id);
                $course->capacity = $request->capacity;
                $course->duration = $request->duration;
                $course->category_id = $request->category_id;
                $course->course_language_id = $request->language_id;
                $course->course_level_id = $request->level_id;
                $course->qna = $request->qna ? 1 : 0;
                $course->certificate = $request->certificate ? 1 : 0;
                $course->save();
                notyf()->success('Course more information saved successfully.');
                return response([
                    'status' => 'success',
                    'message' => 'Course more information saved successfully.',
                    'redirect_route' => route('instructor.course.edit', ['course_id' => $course->id, 'step' => $request->next_step])
                ]);
                break;
            case '3':
                return 'this is case 3 for update';
                break;
            case '4':
                return 'this is case 4 for upadte';
                break;
            default:
                return 'this is default case for update';
                break;
        }
      
    }
}
