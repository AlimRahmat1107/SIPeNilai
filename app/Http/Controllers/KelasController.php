<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Semester;

class KelasController extends Controller
{
   public function index(){
        $kelases =  Kelas::paginate(10);
        return view('admin.kelases.index',compact('kelases'));
    }

   public function indexUser(){
        $kelases =  Kelas::all();
        return view('kelas',compact('kelases'));
    }


    public function create(){
        $kelases =  Kelas::all();
        return view('admin.kelases.create',compact('kelases'));
    }



    public function store(Request $request){
       $validated= $request->validate([
            'name' => 'required', 
            'semester_id' => 'required',
        ]);

        Kelas::create($validated);
        return redirect('/kelas');
    }




       public function edit(){
        $kelases =  Kelas::all();
         return view('admin.kelases.update',compact('kelases'));
    }


    public function update(Request $request){
      $validated =  $request->validate([
            'semester_code' => 'require',
            'name' => 'required', 
        ]);
        Kelas::updated($validated);
        return redirect('/kelas');
    }


    public function delete($id){
        Kelas::deleted($id);
    }
}
