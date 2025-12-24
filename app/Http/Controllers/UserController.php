<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View{
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function create(): View{
        $roles = Role::all();

        return view('admin.users.create',compact('users','roles'));

    }

    public function store(Request $request){

        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'roles.*' =>'exists:roles,id',
            'roles'=> 'required'
        ],
    [
       'email' => 'Email ini telah di gunakan' ,
       'username' => 'Username ini telah di gunakan' ,
       'password_confirmation' => ' password tidak sama',
       'roles' => 'pilih salah satu Role'
    ]);


        $validated['password'] = Hash::make($validated['password']);

       $user = User::create($validated);

        $user->roles()->attach($request->roles);



        return redirect(route('users.index'))->with('success', 'User berhasil ditambahkan!');

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

        return redirect(route('users.index'))->with('success', 'User berhasil diperbarui!');



    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->destroy($id);
        return redirect(route('users.index'))->with('success', 'Role berhasil dihapus!');
    }

    public function search(Request $request){

        $users = User::with('roles')->where('username','like','%'.$request['search'].'%')->get();
  
        // $users =DB::table('users')->join('role_user','users.id','=','role_user.user_id')
        // ->join('roles','role_user.role_id','=','roles.id')
        // ->where('username','like','%'.$request['search'].'%')
        // ->select('users.*','roles.name as roles')
        // ->get();


       
        return view('admin.users.index', compact('users'));
    }


}
