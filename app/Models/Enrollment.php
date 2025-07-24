<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['lecture_id','semester_id','student_id','csc_id','scs_id'];

    public function lecture(){
        return $this->belongsTo(Lecture::class,'lecture_id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function csc(){
        return $this->belongsTo(CuricullumSemesterCourse::class,'csc_id');
    }

    public function scs(){
        return $this->belongsTo(StudentClassSemester::class,'scs_id');
    }

  
}
