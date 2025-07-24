<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingAssigment extends Model
{
    use HasFactory;
        protected $fillable = ['lecture_id','enrollment_id'];

    public function lecture(){
        return $this->belongsTo(Lecture::class,'lecture_id');
    }

    public function enrollment(){
        return $this->belongsTo(Enrollment::class,'enrollment_id');
    }
}
