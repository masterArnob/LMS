<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
