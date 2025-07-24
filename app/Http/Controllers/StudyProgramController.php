<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Models\StudyProgram;

class StudyProgramController extends Controller
{
     public function index(){
        $studyPrograms =  StudyProgram::all();
        return view('admin.studyPrograms.index',compact('studyPrograms'));
    }

    public function create(){
        $studyPrograms =  StudyProgram::all();
        $majors =  Major::all();
  
        return view('admin.studyPrograms.create',compact('studyPrograms','majors'));
    }

    public function store(Request $request){
       $validate = $request->validate([
            'name' => 'required', 
            'major_id' => 'required',
        ]);

        StudyProgram::create($validate);
        return redirect('/prodi');
    }

       public function edit(){
        $studyPrograms =  StudyProgram::all();
         return view('admin.studyPrograms.update',compact('studyPrograms'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        StudyProgram::updated($validated);
        return redirect('/prodi');
    }


    public function delete($id){
        StudyProgram::deleted($id);
    }
}
