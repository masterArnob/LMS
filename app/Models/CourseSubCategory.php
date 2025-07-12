<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubCategory extends Model
{
    public function category(){
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
}
