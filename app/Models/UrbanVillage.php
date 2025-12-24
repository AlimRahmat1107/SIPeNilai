<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrbanVillage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function district(){
        return $this->belongsTo(Subdistrict::class,'district_id');
    }
}
