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


//Auth
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register-create',[RegisterController::class,'store'])->name('register.create');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-auth',[LoginController::class,'login'])->name('login.create');
Route::get('/logout',[LoginController::class,'logout']);

Route::middleware(['auth','admin','dosen'])->group(function(){

    Route::get('/', function () {
    return view('admin.dashboard');
});

//User
Route::get('/user',[UserController::class,'index']);
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user-create/post',[UserController::class,'store'])->name('user.post');
Route::get('/user/update/{id}',[UserController::class,'edit']);
Route::put('/user-update/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/user-delete/{id}',[UserController::class,'destroy'])->name('user.delete');




//Role
Route::get('/role',[RoleController::class,'index']);
Route::post('/role/create/post',[RoleController::class,'store'])->name('role.post');
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

//Academic Year
Route::get('/academicyear',[AcademicYearController::class,'index']);
Route::get('/academicyear/create',[AcademicYearController::class,'create']);
Route::post('/academicyear-create/post',[AcademicYearController::class,'store'])->name('academicyear.create');
Route::get('/academicyear/update',[AcademicYearController::class,'edit']);
Route::put('/academicyear-update/put',[AcademicYearController::class,'update'])->name('academicyear.update');
Route::delete('/academicyear/delete',[AcademicYearController::class,'delete'])->name('academicyear.delete');

//semester
Route::get('/semester', [SemesterController::class,'index']);
Route::get('/semester/create', [SemesterController::class,'create']);
Route::post('/semester-create', [SemesterController::class,'store'])->name('semester.create');
Route::get('/semester/update', [SemesterController::class,'edit'])->name('semester.edit');
Route::put('/semester-update', [SemesterController::class,'update']);

//mahasiswa
Route::get('/mahasiswa', [StudentController::class, 'index']);
Route::get('/mahasiswa/create', [StudentController::class, 'create']);
Route::post('/mahasiswa-create', [StudentController::class, 'store'])->name('student.create');
Route::get('/mahasiswa/update', [StudentController::class, 'edit']);
Route::put('/mahasiswa-update', [StudentController::class, 'update']);

//kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas-create', [KelasController::class, 'store'])->name('kelas.create');
Route::get('/kelas/update', [KelasController::class, 'edit']);
Route::put('/kelas-update', [KelasController::class, 'update']);

//dosen
Route::get('/dosen', [LectureController::class, 'index']);
Route::get('/dosen/create', [LectureController::class, 'create']);
Route::post('/dosen-create', [LectureController::class, 'store'])->name('dosen.create');
Route::get('/dosen/update', [LectureController::class, 'edit']);
Route::put('/dosen-update', [LectureController::class, 'update']);

//Jurusan
Route::get('/jurusan', [MajorController::class, 'index']);
Route::get('/jurusan/create', [MajorController::class, 'create']);
Route::post('/jurusan-create', [MajorController::class, 'store'])->name('major.create');
Route::get('/jurusan/update', [MajorController::class, 'edit']);
Route::put('/jurusan-update', [MajorController::class, 'update']);

//prodi
Route::get('/prodi', [StudyProgramController::class, 'index']);
Route::get('/prodi/create', [StudyProgramController::class, 'create']);
Route::post('/prodi-create', [StudyProgramController::class, 'store'])->name('study_program.create');
Route::get('/prodi/update', [StudyProgramController::class, 'edit']);
Route::put('/prodi-update', [StudyProgramController::class, 'update']);

//kurikulum
Route::get('/kurikulum', [CuricullumController::class, 'index']);
Route::get('/kurikulum/create', [CuricullumController::class, 'create']);
Route::post('/kurikulum-create', [CuricullumController::class, 'store'])->name('curicullum.create');
Route::get('/kurikulum/update', [CuricullumController::class, 'edit']);
Route::put('/kurikulum-update', [CuricullumController::class, 'update']);

//csc
Route::get('/csc', [CuricullumSemesterCourseController::class, 'index']);
Route::get('/csc/create', [CuricullumSemesterCourseController::class, 'create']);
Route::post('/csc-create', [CuricullumSemesterCourseController::class, 'store'])->name('csc.create');
Route::get('/csc/update', [CuricullumSemesterCourseController::class, 'edit']);
Route::put('/csc-update', [CuricullumSemesterCourseController::class, 'update']);

//matakuliah
Route::get('/matakuliah', [CourseController::class, 'index']);
Route::get('/matakuliah/create', [CourseController::class, 'create']);
Route::post('/matakuliah-create', [CourseController::class, 'store'])->name('course.create');
Route::get('/matakuliah/update', [CourseController::class, 'edit']);
Route::put('/matakuliah-update', [CourseController::class, 'update']);


//penugasan pengajar
Route::get('/penugasan-pengajar', [TeachingAssigmentController::class, 'index']);
Route::get('/penugasan-pengajar/create', [TeachingAssigmentController::class, 'create']);
Route::post('/penugasan-pengajar-create', [TeachingAssigmentController::class, 'store'])->name('course.create');
Route::get('/penugasan-pengajar/update', [TeachingAssigmentController::class, 'edit']);
Route::put('/penugasan-pengajar-update', [TeachingAssigmentController::class, 'update']);

//scs
Route::get('/scs', [StudentClassSemesterController::class, 'index']);
Route::get('/scs/create', [StudentClassSemesterController::class, 'create']);
Route::post('/scs-create', [StudentClassSemesterController::class, 'store'])->name('scs.create');
Route::get('/scs/update', [StudentClassSemesterController::class, 'edit']);
Route::put('/scs-update', [StudentClassSemesterController::class, 'update']);

//enrollment
Route::get('/enrollment', [EnrollmentController::class, 'index']);
Route::get('/enrollment/create', [EnrollmentController::class, 'create']);
Route::post('/enrollment-create', [EnrollmentController::class, 'store'])->name('enrollment.create');
Route::get('/enrollment/update', [EnrollmentController::class, 'edit']);
Route::put('/enrollment-update', [EnrollmentController::class, 'update']);

//grade
Route::get('/nilai', [GradeController::class, 'index']);
Route::get('/nilai/create', [GradeController::class, 'create']);
Route::post('/nilai-create', [GradeController::class, 'store'])->name('grade.create');
Route::get('/nilai/update', [GradeController::class, 'edit']);
Route::put('/nilai-update', [GradeController::class, 'update']);

//sub grade
Route::get('/subnilai', [SubgradeController::class, 'index']);
Route::get('/subnilai/create', [SubgradeController::class, 'create']);
Route::post('/subnilai-create', [SubgradeController::class, 'store'])->name('subnilai.create');
Route::get('/subnilai/update', [SubgradeController::class, 'edit']);
Route::put('/subnilai-update', [SubgradeController::class, 'update']);


});
