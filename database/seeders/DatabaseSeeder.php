<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use App\Models\Province;
use App\Models\City;
use App\Models\User;
use App\Models\Subdistrict;
use App\Models\Ward;
use App\Models\Profile;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $seederPath = database_path('seeders');

        // foreach(File::files($seederPath) as $file){
        //     $class = pathinfo($file, PATHINFO_FILENAME);
        //     if ($class !== 'DatabaseSeeder'){
        //         $this->call($class);
        //     }
        // }









        try {
            Role::create([
                'name' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            Role::create([
                'name' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            Role::create([
                'name' => 'kaprodi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $admin = User::create([
                     'username' => 'admin',
                     'email' => 'admin123@gmail.com',
                     'email_verified_at' => Carbon::now(),
                     'password' => Hash::make('admin123'),
                     'remember_token' => null,
                     'created_at' => Carbon::now(),
                     'updated_at' => Carbon::now(),
             ]);

             $dosen = User::create([
                 'username' => 'dedy',
                 'email' => 'dedy123@gmail.com',
                 'email_verified_at' => Carbon::now(),
                 'password' => Hash::make('dedy123'),
                 'remember_token' => null,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
         ]);

             $adminRole = Role::where('name','admin')->first();
             $dosenRole = Role::where('name','dosen ')->first();

             $admin->roles()->attach($adminRole->id);
             $dosen->roles()->attach($dosenRole->id);



            //  function trims($value) {
            //     return strtolower(trim($value)); // hilangkan spasi & ubah huruf ke kecil
            // }

             // ambil path file csv
             $fileProvince = database_path('\seeders\file\prov.csv');
             $fileCity = database_Path('\seeders\file\city1.csv');
             $fileSubdistrict = database_path('\seeders\file\kec.csv');
             $fileWard = database_Path('\seeders\file\kel.csv');

             //membuka csv dengan delimeter
             function readCsvWithSemicolon($file){
                $data = [];
                if(($handle = fopen($file,'r')) !== false){
                    while(($row=fgetcsv($handle,0,';')) !== false){
                        $data[] =$row;
                    }
                    fclose($handle);
                }
                return $data;
             }



             //
             $csvProvince = readCsvWithSemicolon($fileProvince);
             $csvCity = readCsvWithSemicolon($fileCity);
             $csvSubdistrict = readCsvWithSemicolon($fileSubdistrict);
             $csvWard = readCsvWithSemicolon($fileWard);
           ;




             foreach($csvProvince as $data){
               $province = Province::create([
                    'name' => $data[1]
                ]);

            }
             foreach($csvCity as $data){
                $city = City::create([
                    'name' => $data[1],
                    'province_id'=> $data[2]
                ]);
            }

             foreach($csvSubdistrict as $data){
                $subdistrict = Subdistrict::create([
                    'name' => $data[1],
                    'city_id' => $data[2]
                ]);
            }
             foreach($csvWard as $data){
               $ward =  Ward::create([
                    'name' => $data[1],
                    'subdistrict_id' => $data[2]
                ]);
            }






            // Path file sumber
             $sourcePath = database_path('seeders\file\admin.jpg');

             // Nama file unik agar tidak tabrakan
             $filename = Str::random(10).'.jpg';

             // simpan ke storage /app/public/uploads
             Storage::disk('public')->put('uploads/' . $filename, File::get($sourcePath));

            //  simpan informasi ke database
             Profile::create([
                'user_id' => $admin->id,
                'photo' => 'uploads/'. $filename,
                'fullName' => 'alim rahmat putra',
                'nickName' => 'alim',
                'phone' => '081313131313',
                'address'=> 'limau manis',
                'province_id'=> $province->id,
                'ward_id' => $ward->id,
                'city_id' => $city->id,
                'subdistrict_id' => $subdistrict->id,
                'gender' => 'LAKI-LAKI',
                'dot'=> '2001-11-05'
             ]);



         } catch (\Exception $e) {
             dd($e->getMessage());
         }







    }
}
