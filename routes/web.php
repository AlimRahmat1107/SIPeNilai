<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\SubdistrictController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CuricullumController;
use App\Http\Controllers\CuricullumSemesterCourseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentClassSemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\SubgradeController;
use App\Http\Controllers\TeachingAssigmentController;
use App\Http\Controllers\UrbanVillageController;
use App\Models\TeachingAssigment;

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

Route::middleware(['guest'])->group(function(){
//Auth
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register-create',[RegisterController::class,'store'])->name('register.create');
Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::post('/login-auth',[LoginController::class,'authenticate'])->name('login.create');
Route::get('/logout',[LoginController::class,'logout']);

});


Route::prefix('admin')->middleware(['auth','isadminordosen'])->group(function(){

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



//User
Route::resource('users',UserController::class);
Route::post('user-search',[UserController::class, 'search'])->name('search.users');
Route::resource('roles',RoleController::class);
Route::put('/role/update/{id}',[RoleController::class,'update']);
Route::resource('profiles',ProfileController::class);
Route::get('/get-city/{provinceID}',[ProfileController::class,'getCity']);
Route::get('/get-district/{cityID}',[ProfileController::class,'getDistrict']);
Route::get('/get-urban-village/{districtID}',[ProfileController::class,'getUrbanVillage']);
Route::post('/search-profile',[ProfileController::class,'getSearch'])->name('profile.search');

//Provinsi
Route::post('/provinces/import/',[ProvinceController::class,'import'])->name('province.import');
Route::resource('provinces',ProvinceController::class);

//city
Route::post('/cities/import/',[CityController::class,'import'])->name('city.import');
Route::resource('cities',CityController::class);

//ward
Route::post('/wards/import/',[WardController::class,'import'])->name('ward.import');
Route::resource('wards',WardController::class);

//urban village
Route::post('/urban-villages/import',[UrbanVillageController::class,'import'])->name('urban-village.import');
Route::resource('urban-villages',UrbanVillageController::class);

//district
Route::post('/districts/import/',[DistrictController::class,'import'])->name('district.import');
Route::resource('districts',DistrictController::class);


Route::resource('academicyears',AcademicYearController::class);
Route::resource('semesters',SemesterController::class);
Route::resource('students',StudentController::class);
Route::resource('kelas',KelasController::class);
Route::resource('lectures',LectureController::class);
Route::resource('majors',MajorController::class);
Route::resource('prodis',StudyProgramController::class);
Route::resource('kurikulums',CuricullumController::class);
Route::resource('csc',CuricullumSemesterCourseController::class);
Route::resource('courses',CourseController::class);
Route::resource('penugasan-dosen',TeachingAssigmentController::class);
Route::resource('scs',StudentClassSemesterController::class);
Route::resource('enrollments',EnrollmentController::class);
Route::resource('grades',GradeController::class);
Route::resource('subgrades',SubgradeController::class);
 





});









Route::get('/mahasiswa',[StudentController::class,'indexUser']);
Route::get('/course',[CourseController::class,'indexUser']);
Route::get('/kelas',[KelasController::class,'indexUser']);
Route::get('/enrollment',[EnrollmentController::class,'indexUser'])->name('enrollment.indexUser');
Route::get('/penugasandosen',[TeachingAssigmentController::class,'indexUser'])->name('teachingassigment.indexUser');
Route::get('/grade',[GradeController::class,'indexUser'])->name('grade.indexUser');
Route::get('/subgrade',[SubgradeController::class,'indexUser'])->name('subgrade.indexUser');