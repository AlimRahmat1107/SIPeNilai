<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudyProgram;

class StudentController extends Controller
{
     public function index(){
        $students =  Student::all();
        return view('admin.students.index',compact('students'));
    }

    public function create(){
        $students =  Student::all();
        $kelases =  Kelas::all();
        $studyPrograms =  StudyProgram::all();
        return view('admin.students.create',compact('students','kelases','studyPrograms'));
    }

    public function store(Request $request){
      $validated=  $request->validate([
            'name' => 'required',
            'class_id' => 'required', 
            'study_program_id' => 'required',
        ]);

        Student::create($validated);
        return redirect('/mahasiswa');
    }

       public function edit(){
        $students =  Student::all();
         return view('admin.students.update',compact('students'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        Student::updated($validated);
        return redirect('/student');
    }


    public function delete($id){
        Student::deleted($id);
    }
}
