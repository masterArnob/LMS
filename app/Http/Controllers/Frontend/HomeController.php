<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\becomeInstructorSection;
use App\Models\Brand;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Features;
use App\Models\Footer;
use App\Models\HeroSection;
use App\Models\NewsLetter;
use App\Models\Testimonials;
use App\Models\VideoSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hero = HeroSection::first();
        $feature = Features::first();
        $categories = CourseCategory::where(['status' => 'active', 'show_at_trending' => 'yes'])
        ->orderBy('id', 'DESC')
        ->get();
        $aboutSection = AboutSection::first();
        $becomeInstructorSection = becomeInstructorSection::first();
        $videoSection = VideoSection::first();
        $brands = Brand::where('status', 'active')
        ->orderBy('id', 'DESC')
        ->get();

        $testimonials = Testimonials::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->get();
       
     

        return view('frontend.home', compact(
            'hero',
            'feature',
            'categories',
            'aboutSection',
            'becomeInstructorSection',
            'videoSection',
            'brands',
            'testimonials',
       
        ));
    }






    public function subscribe(Request $request){
       // dd($request->all());
       $subs = new NewsLetter();
       $subs->email = $request->email;
       $subs->save();
       return response(['status' => 'success', 'message' => 'You have successfully subscribed to our newsletter!']);
    }



    public function courseList(){
        $courses = Course::with(['instructor', 'lessons'])
        ->where(['status' => 'active', 'is_approved' => 'approved'])
        ->orderBy('id', 'DESC')
        ->get();
       // dd($courses);
        return view('frontend.pages.course-list', compact('courses'));
    }


    public function courseDetails($slug){
        $course = Course::where(['slug' => $slug, 'status' => 'active', 'is_approved' => 'approved'])
        ->with(['instructor', 'lessons', 'courseLevel', 'courseLang', 'chapters'])
        ->firstOrFail();

        $courseCount = Course::where(['status' => 'active', 'is_approved' => 'approved'])
        ->count();
        return view('frontend.pages.course-details', compact('course', 'courseCount'));
    }
}
