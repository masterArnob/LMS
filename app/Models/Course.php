<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function chapters(){
        return $this->hasMany(CourseChapter::class, 'course_id');
    }

    public function lessons(){
        return $this->hasMany(CourseChapterLesson::class, 'course_id');
    }


    public function category(){
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }


    public function courseLevel(){
        return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }

    public function courseLang(){
        return $this->belongsTo(CourseLanguage::class, 'course_language_id');
    }
}
