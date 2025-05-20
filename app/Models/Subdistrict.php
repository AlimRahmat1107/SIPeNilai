<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }
}
