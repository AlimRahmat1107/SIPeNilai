<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UrbanVillage;
use Illuminate\Http\Request;

class UrbanVillageController extends Controller
{
    public function index(){
        $urbanVillage = UrbanVillage::paginate(10);
        return view('admin');
    }
}
