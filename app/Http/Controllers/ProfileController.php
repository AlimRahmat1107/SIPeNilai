<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Subdistrict;
use App\Models\UrbanVillage;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::with(['user','province','city','urbanVillage','district'])->orderBy('user_id')->paginate(10);
        return view('admin.profiles.index',compact('profiles'));
    }

    public function create(){
        $profiles = Profile::all();
        $users = User::all();
        $provinces = Province::all();
        $cities = City::all();
        $urbanVillages = UrbanVillage::all();
        $districts =District::all();
        return view('admin.profiles.create',compact('profiles','users','provinces','cities','urbanVillages','districts'));

    }

    public function store(Request $request){

        $validated = $request->validate([
            'user_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fullName' => 'required',
            'nickName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'urban_village_id' => 'required',
            'gender' => 'required',
            'dot' => 'required'

        ]);

      if ($request->hasFile('photo')) {
    $file = $request->file('photo');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads'), $filename);
    $validated['photo'] = $filename;
}





        Profile::create($validated);


        return redirect('/profiles')->with('success', 'profiles berhasil diperbarui!');

    }



    public function edit($id){
        $profiles = Profile::find($id);
        $users = User::all();
        $provinces = Province::all();
        $cities = City::all();
        $urbanVillages = UrbanVillage::all();
        $districts =District::all();
        return view('admin.profiles.update',compact('profiles','users','provinces','cities','urbanVillages','districts'));


    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'user_id' => 'required',
            'fullName' => 'required',
            'nickName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'urban_village_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'gender' => 'required',
            'dot' => 'required'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update($validated);


        return redirect(route('profiles.index'))->with('success', 'profile berhasil diperbarui!');



    }

    public function destroy($id){
        $profile = Profile::findOrFail($id);
        $profile->destroy($id);
        return redirect(route('profiles.index'))->with('success', 'Profile berhasil diperbarui!');
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


    public function getCity($provinceID){
        $city = City::where('province_id',$provinceID)->get();
        return response()->json($city);
        
    }
   

    public function getDistrict($cityID){

        $district = District::where('city_id',$cityID)->get();
        return response()->json($district);
    }

    public function getUrbanVillage($districtID){

        $urbanVillage = UrbanVillage::where('district_id',$districtID)->get();
        return response()->json($urbanVillage);
    }





}
