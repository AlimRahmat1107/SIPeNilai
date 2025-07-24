<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
       public function index()
    {
        $grades =  Grade::all();

        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        $grades =  Grade::all();
        $enrollments =  Enrollment::all();
      
        return view('admin.grades.create', compact('grades','enrollments'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'enrollment_id' => 'required',
            'sikap' => 'required',
            'tugas' => 'required',
            'kompetensi' => 'required',
            'nilai_akhir' => 'required',
        ]);

        Grade::create($validated);
        return redirect('/Grade');
    }

    public function edit()
    {
        $grades =  Grade::all();
        return view('admin.grades.update', compact('grades'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'Grade_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        Grade::updated($request);
        return redirect('/Grade');
    }


    public function delete($id)
    {
        Grade::deleted($id);
    }
}
