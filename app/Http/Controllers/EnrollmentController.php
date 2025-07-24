<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CuricullumSemesterCourse;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Lecture;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClassSemester;

class EnrollmentController extends Controller
{
       public function index()
    {
        $enrollments =  Enrollment::all();

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $enrollments =  Enrollment::all();
        $lecturs =  Lecture::all();
        $semesters =  Semester::all();
        $students =  Student::all();
        $csc =  CuricullumSemesterCourse::all();
        $scs =  StudentClassSemester::all();
        return view('admin.enrollments.create', compact('enrollments','semesters','lecturs','students','csc','scs'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'lecture_id' => 'required',
            'semester_id' => 'required',
            'student_id' => 'required',
            'csc_id' => 'required',
            'scs_id' => 'required',
        ]);

        Enrollment::create($validated);
        return redirect('/enrollment');
    }

    public function edit()
    {
        $enrollments =  Enrollment::all();
        return view('admin.enrollments.update', compact('enrollments'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'Enrollment_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        Enrollment::updated($request);
        return redirect('/enrollment');
    }


    public function delete($id)
    {
        Enrollment::deleted($id);
    }
}
