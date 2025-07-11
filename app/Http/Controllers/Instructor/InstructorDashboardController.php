<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorDashboardController extends Controller
{
        public function dashboard(){
        return view('instructor.instructor_dashboard');
    }
}
