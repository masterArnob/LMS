<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function order(){
         return $this->belongsTo(Order::class, 'order_id');
    }
}
