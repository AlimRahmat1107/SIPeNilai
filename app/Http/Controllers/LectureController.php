<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\StudyProgram;
use App\Models\User;
use App\Models\Major;

class LectureController extends Controller
{
     public function index(){
        $lecturs =  Lecture::all();
        return view('admin.lecturs.index',compact('lecturs'));
    }

    public function create(){
        $lecturs =  Lecture::all();
        $users =  User::all();
        $majors =  Major::all();
        $studyPrograms =  StudyProgram::all();
        return view('admin.lecturs.create',compact('lecturs','users','majors','studyPrograms'));
    }

    public function store(Request $request){
      $validated = $request->validate([
            'user_id' => 'required',
            'nip' => 'required', 
            'nidn' => 'required',
            'major_id' => 'required',
            'study_program_id' => 'required',
        ]);

        Lecture::create($validated);
        return redirect('/dosen');
    }

       public function edit(){
        $lecturs =  Lecture::all();
         return view('admin.lecturs.update',compact('lecturs'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        Lecture::updated($validated);
        return redirect('/dosen');
    }


    public function delete($id){
        Lecture::deleted($id);
    }
}
