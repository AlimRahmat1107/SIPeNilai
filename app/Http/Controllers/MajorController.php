<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
     public function index(){
        $majors =  Major::all();
        return view('admin.majors.index',compact('majors'));
    }

    public function create(){
        $majors =  Major::all();
  
        return view('admin.majors.create',compact('majors',));
    }

    public function store(Request $request){

       $validated = $request->validate([
            'name' => 'required', 
        ]);

        Major::create($validated);
        return redirect('/jurusan');
    }

       public function edit(){
        $majors =  Major::all();
         return view('admin.majors.update',compact('majors'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        Major::updated($validated);
        return redirect('/jurusan');
    }


    public function delete($id){
        Major::deleted($id);
    }
}
