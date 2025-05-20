<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;

class SubdistrictController extends Controller
{
    public function index(){
        $subdistricts = Subdistrict::paginate(10);
        return view('admin.subdistricts.index',compact('subdistricts'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line,';');
            // dd($data);

            Subdistrict::create([
                'id' => $data[0],
                'name' => $data[1],
                'city_id' => $data[2],
                // Add more fields as needed
            ]);
        }

        return redirect('/subdistricts')->with('success', 'CSV file imported successfully.');
    }
}
