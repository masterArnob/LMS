<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id');
    }


    public function lessons(){
        return $this->hasMany(CourseChapterLesson::class, 'course_id');
    }
}
