<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassSemester extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','kelas_id','semester_id'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }
}
