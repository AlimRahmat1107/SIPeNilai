<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function urbanVillage(){
        return $this->belongsTo(urbanVillage::class,'urban_village_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
