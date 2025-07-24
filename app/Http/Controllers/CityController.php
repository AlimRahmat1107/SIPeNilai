<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index(){
        $cities = City::paginate(10);
        return view('admin.cities.index',compact('cities'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line,';');
            // dd($data);

            City::create([
                'id' => $data[0],
                'name' => $data[1],
                'province_id' => $data[2]
                // Add more fields as needed
            ]);
        }

        return redirect('/cities')->with('success', 'CSV file imported successfully.');
    }
}
