<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses =  Course::paginate();
        return view('admin.courses.index',compact('courses'));
    }

    public function indexUser(){
        $courses =  Course::paginate();
        return view('course',compact('courses'));
    }

    public function create(){
        $courses =  Course::paginate();
  
        return view('admin.courses.create',compact('courses'));
    }

    public function store(Request $request){
       $validate = $request->validate([
            'name' => 'required', 
            'code' => 'required', 
           
        ]);

        Course::create($validate);
        return redirect('/matakuliah');
    }

       public function edit(){
        $courses =  Course::all();
         return view('admin.courses.update',compact('courses'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        Course::updated($validated);
        return redirect('/matakuliah');
    }


    public function delete($id){
        Course::deleted($id);
    }
}
