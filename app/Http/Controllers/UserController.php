<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.create',compact('users','roles'));

    }

    public function store(Request $request){

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:8|confirmed',
            'roles.*' =>'exists:roles,id'
        ]);


        $validated['password'] = Hash::make($validated['password']);

       $user = User::create($validated);
        $user->roles()->attach($request->roles);


        return redirect('/user')->with('success', 'User berhasil diperbarui!');

    }



    public function edit($id){
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.update',compact('users','roles'));

    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'email|required',
            'password' => '|min:8|confirmed',
            'roles.*' =>'exists:roles,id'
        ]);
        $roles = $validated['roles'] ?? [];
        unset($validated['roles']);
        $user = user::findOrFail($id);

        $user->update($validated);
        $user->roles()->sync($roles);

        return redirect('/user')->with('success', 'User berhasil diperbarui!');



    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->destroy($id);
        return redirect('/user')->with('success', 'Role berhasil diperbarui!');
    }


}
