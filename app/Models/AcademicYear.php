<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $fillable = ['academic_year_code','startdate','end_date','is_active'];


    public function semester(){
         return $this->hasMany(Semester::class);
    }
    

}
