<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Profile;

class ProvinceController extends Controller
{

    public function index(){
        $provinces = Province::paginate(10);
        return view('admin.provinces.index',compact('provinces'));
    }


    public function import(Request $request)
{
    $file = $request->file('file');
    $fileContents = file($file->getPathname());

    foreach ($fileContents as $line) {
        $data = str_getcsv($line,';');
        // dd($data);

        Province::create([
            'id' => $data[0],
            'name' => $data[1]
            // Add more fields as needed
        ]);
    }

    return redirect('/provinces')->with('success', 'CSV file imported successfully.');
}

}
