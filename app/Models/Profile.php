<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function provinces(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function wards(){
        return $this->belongsTo(Ward::class,'ward_id');
    }

    public function subdistricts(){
        return $this->belongsTo(Subdistrict::class,'subdistrict_id');
    }

    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }
}
