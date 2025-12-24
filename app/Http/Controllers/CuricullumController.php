<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curicullum;
use App\Models\StudyProgram;

class CuricullumController extends Controller
{
    public function index(){
        $curicullums =  Curicullum::with('study_program_id')->orderBy('student_id')->paginate(10);
        return view('admin.curicullums.index',compact('curicullums'));
    }

    public function create(){
        $curicullums =  Curicullum::all();
        $studyPrograms =  StudyProgram::all();
  
        return view('admin.curicullums.create',compact('curicullums','studyPrograms'));
    }

    public function store(Request $request){
       $validate = $request->validate([
            'name' => 'required', 
            'study_program_id' => 'required',
            'start_year' => 'required',
            'is_active' => 'required',
        ]);

        Curicullum::create($validate);
        return redirect('/kurikulum');
    }

       public function edit(){
        $curicullums =  Curicullum::all();
         return view('admin.curicullums.update',compact('curicullums'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
            'academic_year_id' => 'required',
        ]);
        Curicullum::updated($validated);
        return redirect('/kurikulum');
    }


    public function delete($id){
        Curicullum::deleted($id);
    }
}
