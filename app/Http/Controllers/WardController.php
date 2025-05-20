<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ward;

class WardController extends Controller
{
    public function index(){
        $wards = Ward::paginate(10);
        return view('admin.wards.index',compact('wards'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line,';');
            // dd($data);

            Ward::create([
                'id' => $data[0],
                'name' => $data[1],
                'subdistrict_id' => $data[2]
                // Add more fields as needed
            ]);
        }

        return redirect('/wards')->with('success', 'CSV file imported successfully.');
    }
}
