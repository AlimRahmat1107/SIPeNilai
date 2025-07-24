<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index(){
        
        return view('admin.Auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required| string|min:8|confirmed',
        ]);
          $validated['password'] = Hash::make($validated['password']);

       $user= User::create($validated);
        $user->roles()->attach(2);
        return redirect('/login');
    }

}
