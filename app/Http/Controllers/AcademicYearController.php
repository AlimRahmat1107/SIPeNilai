<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index(){
        $academicYear = AcademicYear::all();
        return view('admin.academic-year.index', compact('academicYear'));

    }

    public function create(){
        $academicYear = AcademicYear::all();

        return view('admin.academic-year.create', compact('academicYear'));

    }

    public function store(Request $request){

       
        $validation = $request->validate([
            'academic_year_code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required'
        ]);

        AcademicYear::create($validation);


        return redirect('/academicyear')->with('sukses');

    }

    public function edit($id){
        $dataAcademicYear = AcademicYear::findOrFail($id);
        return view('admin.profiles.update',compact('dataAcademicYear'));


    }

    public function update(Request $request, $id){
        $validated = $request->validate([
             'academic_year_code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required'
            
        ]);

        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->update($validated);


        return redirect('/academicyear')->with('success', 'profile berhasil diperbarui!');



    }

    public function destroy($id){
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->destroy($id);
        return redirect('/academicyear')->with('success', 'Profile berhasil diperbarui!');
    }
}
