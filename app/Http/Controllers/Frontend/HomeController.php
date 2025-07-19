<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\becomeInstructorSection;
use App\Models\CourseCategory;
use App\Models\Features;
use App\Models\HeroSection;
use App\Models\NewsLetter;
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
        return view('frontend.home', compact(
            'hero',
            'feature',
            'categories',
            'aboutSection',
            'becomeInstructorSection',
            'videoSection'
        ));
    }






    public function subscribe(Request $request){
       // dd($request->all());
       $subs = new NewsLetter();
       $subs->email = $request->email;
       $subs->save();
       return response(['status' => 'success', 'message' => 'You have successfully subscribed to our newsletter!']);
    }
}
