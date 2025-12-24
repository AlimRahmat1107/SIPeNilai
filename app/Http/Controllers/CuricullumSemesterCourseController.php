<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Curicullum;
use Illuminate\Http\Request;
use App\Models\CuricullumSemesterCourse;
use App\Models\Semester;

class CuricullumSemesterCourseController extends Controller
{
    public function index()
    {
        $csc =  CuricullumSemesterCourse::with(['curicullum','semester','course'])->orderBy('semester_id')->paginate(10);

        return view('admin.csc.index', compact('csc'));
    }

    public function create()
    {
        $csc =  CuricullumSemesterCourse::all();
        $curicullums =  Curicullum::all();
        $semesters =  Semester::all();
        $courses =  Course::all();
        return view('admin.csc.create', compact('csc','semesters','curicullums','courses'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'curicullum_id' => 'required',
            'semester_id' => 'required',
            'course_id' => 'required',
        ]);

        CuricullumSemesterCourse::create($validated);
        return redirect('/csc');
    }

    public function edit()
    {
        $csc =  CuricullumSemesterCourse::all();
        return view('admin.csc.update', compact('csc'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'CuricullumSemesterCourse_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        CuricullumSemesterCourse::updated($request);
        return redirect('/csc');
    }


    public function delete($id)
    {
        CuricullumSemesterCourse::deleted($id);
    }
}
