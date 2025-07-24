<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nip','nidn','major_id','study_program_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function major(){
        return $this->belongsTo(Major::class,'user_id');
    }
    public function studyProgram(){
        return $this->belongsTo(StudyProgram::class,'user_id');
    }
}
