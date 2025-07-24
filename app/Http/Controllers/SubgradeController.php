<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subgrade;
use Illuminate\Http\Request;

class SubgradeController extends Controller
{
         public function index()
    {
        $subGrades =  Subgrade::all();

        return view('admin.subgrades.index', compact('subGrades'));
    }

    public function create()
    {
        $subGrades =  Subgrade::all();
        $grades =  Grade::all();
      
        return view('admin.subgrades.create', compact('subGrades','grades'));
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'grade_id' => 'required',
            'nama_tugas' => 'required',
            'nilai_tugas' => 'required',
           
        ]);

        Subgrade::create($validated);
        return redirect('/Grade');
    }

    public function edit()
    {
        $subGrades =  Subgrade::all();
        return view('admin.subgrades.update', compact('subGrades'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'Grade_code' => 'require',
            'name' => 'required|in:GANJIL,GENAP',
            'academic_year_id' => 'required',
        ]);
        Subgrade::updated($request);
        return redirect('/Grade');
    }


    public function delete($id)
    {
        Subgrade::deleted($id);
    }

}
