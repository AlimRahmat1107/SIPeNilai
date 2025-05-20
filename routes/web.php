<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\SubdistrictController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});


//User
Route::get('/user',[UserController::class,'index']);
Route::get('/user-create',[UserController::class,'create']);
Route::post('/user-create/post',[UserController::class,'store'])->name('user.post');
Route::get('user/update/{id}',[UserController::class,'edit']);
Route::put('user/update/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('user.delete');



//Role
Route::get('/role',[RoleController::class,'index']);
Route::post('/role-create/post',[RoleController::class,'store'])->name('role.post');
Route::put('/role/update/{id}',[RoleController::class,'update'])->name('role.update');
Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('role.delete');

//Profiles
Route::get('/profiles',[ProfileController::class,'index']);
Route::get('/profiles/create',[ProfileController::class,'create']);
Route::post('/profile-create/post',[ProfileController::class,'store'])->name('profile.post');
Route::get('profiles/update/{id}',[ProfileController::class,'edit']);
Route::put('profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile/delete/{id}',[ProfileController::class,'destroy'])->name('profile.delete');
Route::get('/get-kota/{provinsiID}',[ProfileController::class,'getCity']);
Route::get('/get-kecamatan/{cityID}',[ProfileController::class,'getSubdistrict']);
Route::get('/get-kelurahan/{subdistrictID}',[ProfileController::class,'getWard']);
Route::post('/search-profile',[ProfileController::class,'getSearch'])->name('profile.search');



//Provinsi
Route::get('/provinces',[ProvinceController::class,'index']);
Route::post('/provinces/import/',[ProvinceController::class,'import'])->name('province.import');

//city
Route::get('/cities',[CityController::class,'index']);
Route::post('/cities/import/',[CityController::class,'import'])->name('city.import');

//ward
Route::get('/wards',[WardController::class,'index']);
Route::post('/wards/import/',[WardController::class,'import'])->name('ward.import');

//Provinsi
Route::get('/subdistricts',[SubdistrictController::class,'index']);
Route::post('/subdistricts/import/',[SubdistrictController::class,'import'])->name('subdistrict.import');
