<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssigment;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Lecture;

class TeachingAssigmentController extends Controller
{
     public function index()
    {
        $teachingAssigments =  TeachingAssigment::all();
        
        return view('admin.teachingassigments.index', compact('teachingAssigments'));
    }

    public function create()
    {
        $teachingAssigments =  TeachingAssigment::all();
        $lecturs = Lecture::all();
        $enrollments = Enrollment::all();
        return view('admin.teachingassigments.create', compact('teachingAssigments', 'lecturs','enrollments'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'lecture_id' => 'required',
            'enrollment_id' => 'required',
      
        ]);

        TeachingAssigment::create($validated);
        return redirect('/penugasan-pengajar');
    }

    public function edit()
    {
        $teachingAssigments =  TeachingAssigment::all();
        return view('admin.TeachingAssigment.update', compact('teachingAssigments'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'TeachingAssigment_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        TeachingAssigment::updated($request);
        return redirect('/penugasan-pengajar');
    }


    public function delete($id)
    {
        TeachingAssigment::deleted($id);
    }
}
