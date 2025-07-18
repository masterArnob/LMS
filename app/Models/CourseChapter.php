<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    public function lessons(){
        return $this->hasMany(CourseChapterLesson::class, 'chapter_id');
    }
}
