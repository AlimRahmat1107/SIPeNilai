<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public function index(){
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }



    public function store(Request $request){

        $validated = $request->validate([
            "name"=> "required"
        ]);

        Role::create($validated);
        return redirect('/role');

    }
   public function update(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required'
    ]);

    $role = Role::findOrFail($id); // Cari data berdasarkan ID
    $role->update($validated); // Update data

    return redirect('/role')->with('success', 'Role berhasil diperbarui!');
}

public function destroy($id){
    $role = Role::findOrFail($id);
    $role->destroy($id);
    return redirect('/role')->with('success', 'Role berhasil diperbarui!');
}



}
