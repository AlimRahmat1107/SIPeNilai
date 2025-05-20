<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Province;
use App\Models\City;
use App\Models\Ward;
use App\Models\Subdistrict;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::all();
        return view('admin.profiles.index',compact('profiles'));
    }

    public function create(){
        $dataProfiles = Profile::all();
        $dataUsers = User::all();
        $dataProvinces = Province::all();
        $dataCities = City::all();
        $dataWards = Ward::all();
        $dataSubdistricts =Subdistrict::all();
        return view('admin.profiles.create',compact('dataProfiles','dataUsers','dataProvinces','dataCities','dataWards','dataSubdistricts'));

    }

    public function store(Request $request){


        $validated = $request->validate([
            'user_id' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fullName' => 'required',
            'nickName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'subdistrict_id' => 'required',
            'ward_id' => 'required',
            'gender' => 'required',
            'dot' => 'required'

        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $profile = new profile();
            $profile->pitcure = $filename;
            $profile->save();   
        }




        Profile::create($validated);


        return redirect('/profiles')->with('success', 'profiles berhasil diperbarui!');

    }



    public function edit($id){
        $dataProfiles = Profile::find($id);
        $dataUsers = User::all();
        $dataProvinces = Province::all();
        $dataCities = City::all();
        $dataWards = Ward::all();
        $dataSubdistricts =Subdistrict::all();
        return view('admin.profiles.update',compact('dataProfiles','dataUsers','dataProvinces','dataCities','dataWards','dataSubdistricts'));


    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'user_id' => 'required',
            'fullName' => 'required',
            'nickName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'ward_Id' => 'required',
            'subdistrict_id' => 'required',
            'city_id' => 'required',
            'gender' => 'required',
            'dot' => 'required'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update($validated);


        return redirect('/profiles')->with('success', 'profile berhasil diperbarui!');



    }

    public function destroy($id){
        $profile = Profile::findOrFail($id);
        $profile->destroy($id);
        return redirect('/profiles')->with('success', 'Profile berhasil diperbarui!');
    }

    public function getSearch(Request $request)
    {
        $profiles = Profile::query();

        if ($request->has('search')) {
            $search = $request->search;
            $profiles->where('fullName', 'LIKE', "%{$search}%")
                  ->orWhere('nickName', 'LIKE', "%{$search}%");
        }

        $profiles = $profiles->get();
        return view('admin.profiles.index',compact('profiles'));


    }


    public function getCity($provinsiID){

        $kota = City::where('province_id',$provinsiID)->get();
        return response()->json($kota);
    }

    public function getSubdistrict($cityID){

        $kecamatan = Subdistrict::where('city_id',$cityID)->get();
        return response()->json($kecamatan);
    }

    public function getWard($subdistrictsID){

        $kelurahan = Ward::where('subdistrict_id',$subdistrictsID)->get();
        return response()->json($kelurahan);
    }





}
