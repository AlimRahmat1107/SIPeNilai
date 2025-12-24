<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    public function index()
    {
        $majors =  Major::paginate(10);
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        $majors =  Major::all();

        return view('admin.majors.create', compact('majors',));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
        ]);

        Major::create($validated);
        return redirect(route('majors.index'));
    }

    public function edit($id)
    {
        $majors =  Major::find($id);
        return view('admin.majors.update', compact('majors'));
    }


    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'name' => 'required',
        ]);

        $majors = Major::findOrFail($id);
        $majors->update($validated);
        return redirect(route('majors.index'));
    }


    public function destroy($id)
    {
        Major::destroy($id);
        return redirect(route('majors.index'));
    }
}
