<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\AboutSection;
use App\Models\becomeInstructorSection;
use App\Models\Brand;
use App\Models\ContactUsPage;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use App\Models\CustomPageBuilder;
use App\Models\Features;
use App\Models\Footer;
use App\Models\HeroSection;
use App\Models\LatestCourse;
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


        $latest = LatestCourse::first();  
        

        return view('frontend.home', compact(
            'hero',
            'feature',
            'categories',
            'aboutSection',
            'becomeInstructorSection',
            'videoSection',
            'brands',
            'testimonials',
            'latest'
        ));
    }






    public function subscribe(Request $request){
       // dd($request->all());
       $subs = new NewsLetter();
       $subs->email = $request->email;
       $subs->save();
       return response(['status' => 'success', 'message' => 'You have successfully subscribed to our newsletter!']);
    }



    public function courseList(Request $request){
        $courses = Course::with(['instructor', 'lessons'])
        ->where(['status' => 'active', 'is_approved' => 'approved'])
        ->when($request->has('search') && $request->filled('search'), function($query) use ($request){
            $query->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('description', 'like', '%'.$request->search.'%');
        })
        ->when($request->has('category') && $request->filled('category'), function($query) use ($request){
            $query->whereIn('category_id', $request->category);
        })
        ->when($request->has('level') && $request->filled('level'), function($query) use ($request){
            $query->whereIn('course_level_id', $request->level);
        })
        ->when($request->has('lang') && $request->filled('lang'), function($query) use ($request){
            $query->whereIn('course_language_id', $request->lang);
        })
        ->orderBy('id', 'DESC')
        ->get();
       // dd($courses);

       $categories = CourseCategory::where('status', 'active')
       ->orderBy('id', 'DESC')
       ->get();

       $levels = CourseLevel::where('status', 'active')
       ->orderby('id', 'DESC')
       ->get();

       $langs = CourseLanguage::where('status', 'active')
       ->orderBy('id', 'DESC')
       ->get();

        return view('frontend.pages.course-list', compact('courses', 'categories', 'levels', 'langs'));
    }


    public function courseDetails($slug){
        $course = Course::where(['slug' => $slug, 'status' => 'active', 'is_approved' => 'approved'])
        ->with(['instructor', 'lessons', 'courseLevel', 'courseLang', 'chapters'])
        ->firstOrFail();

        $courseCount = Course::where(['status' => 'active', 'is_approved' => 'approved'])
        ->count();
        return view('frontend.pages.course-details', compact('course', 'courseCount'));
    }



    public function CustomPage($slug){
        $page = CustomPageBuilder::where('slug', $slug)
        ->where('status', 'active')
        ->firstOrFail();
        return view('frontend.pages.custom-page.index', compact('page'));
    }


    public function about(){
        $about = AboutPage::first();
        $aboutSection = AboutSection::first();
          $testimonials = Testimonials::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.pages.about.index', compact('about', 'aboutSection', 'testimonials'));
    }



    public function contactPage(){
        $page = ContactUsPage::first();
        return view('frontend.pages.contact.index', compact('page'));
    }
}
