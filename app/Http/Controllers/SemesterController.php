<?php

namespace App\Http\Controllers;

use App\Models\Semester;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters =  Semester::all();

        return view('admin.semester.index', compact('semesters'));
    }

    public function create()
    {
        $semesters =  Semester::all();
        $academicYears = AcademicYear::all();
        return view('admin.semester.create', compact('semesters', 'academicYears'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'code' => 'required',
            'number' => 'required',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);

        Semester::create($validated);
        return redirect('/semester');
    }

    public function edit()
    {
        $semesters =  Semester::all();
        return view('admin.semester.update', compact('semesters'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'semester_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        Semester::updated($request);
        return redirect('/semester');
    }


    public function delete($id)
    {
        Semester::deleted($id);
    }
}
