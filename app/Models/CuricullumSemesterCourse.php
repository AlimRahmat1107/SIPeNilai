<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuricullumSemesterCourse extends Model
{
    use HasFactory;
    protected $fillable = ['curicullum_id','semester_id','course_id'];

    public function curicullum(){
        return $this->belongsTo(Curicullum::class,'curicullum_id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

}
