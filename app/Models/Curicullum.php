<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curicullum extends Model
{
    use HasFactory;
    protected $fillable = ['name','study_program_id','start_year','is_active'];

    public function studyProgram(){
        return $this->belongsTo(StudyProgram::class,'study_program_id');
    }

}
