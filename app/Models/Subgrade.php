<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgrade extends Model
{
    use HasFactory;
    protected $fillable = ['grade_id','nama_tugas','nilai_tugas'];

    public function grade(){
        return $this->belongsTo(grade::class,'grade_id');
    }
}
