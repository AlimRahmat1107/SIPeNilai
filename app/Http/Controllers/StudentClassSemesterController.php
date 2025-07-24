<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentClassSemester;

class StudentClassSemesterController extends Controller
{
     public function index()
    {
        $scs =  StudentClassSemester::all();

        return view('admin.scs.index', compact('scs'));
    }

    public function create()
    {
        $scs =  StudentClassSemester::all();
        $students =  Student::all();
        $semesters =  Semester::all();
        $kelases =  Kelas::all();
        return view('admin.scs.create', compact('scs','semesters','students','kelases'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'student_id' => 'required',
            'kelas_id' => 'required',
            'semester_id' => 'required',
        ]);

        StudentClassSemester::create($validated);
        return redirect('/scs');
    }

    public function edit()
    {
        $scs =  StudentClassSemester::all();
        return view('admin.scs.update', compact('scs'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'StudentClassSemester_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        StudentClassSemester::updated($request);
        return redirect('/scs');
    }


    public function delete($id)
    {
        StudentClassSemester::deleted($id);
    }
}
