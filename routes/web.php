<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//home routes 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search/doctor', [App\Http\Controllers\HomeController::class, 'getDoctor'])->name('getDoctor');
Route::get('/search/doctor/show/{id}', [App\Http\Controllers\HomeController::class, 'takeAppointment'])->name('takeAppointment');
Route::get('/search/doctor/show/hours/{date}/{id}', [App\Http\Controllers\HomeController::class, 'getHour'])->name('getHour');

//auth routes
Auth::routes();

Route::get('/admin/panel', function () {
    return view('admin.admin');
})->middleware('admin')->name('admin');





// doctor routes
Route::get('/doctor/panel', [App\Http\Controllers\DoctorContorller::class, 'index'])->name('doctor')->middleware('doctor');
Route::get('/doctor/timetable', [App\Http\Controllers\DoctorContorller::class, 'timeTable'])->name('doctorTimeTable')->middleware('doctor');
Route::post('/doctor/timetable/post', [App\Http\Controllers\DoctorContorller::class, 'timeTableStore'])->name('doctorTimeTablePost')->middleware('doctor');
Route::put('/doctor/timetable/update', [App\Http\Controllers\DoctorContorller::class, 'timeTablePut'])->name('doctorTimeTablePut')->middleware('doctor');
Route::get('/doctor/informations', [App\Http\Controllers\DoctorContorller::class, 'doctorInfo'])->name('doctorInfo')->middleware('doctor');
Route::post('/doctor/information/post', [App\Http\Controllers\DoctorContorller::class, 'doctorInfoStore'])->name('doctorInfoStore')->middleware('doctor');
Route::put('/doctor/information/update', [App\Http\Controllers\DoctorContorller::class, 'doctorInfoUpdate'])->name('doctorInfoUpdate')->middleware('doctor');
Route::get('/doctor/validation', [App\Http\Controllers\DoctorContorller::class, 'validation'])->name('validation')->middleware('doctor');
Route::get('/doctor/archive/patient', [App\Http\Controllers\DoctorContorller::class, 'ArchivePatient'])->name('ArchivePatient')->middleware('doctor');
Route::put('/doctor/validate/{id}', [App\Http\Controllers\DoctorContorller::class, 'validateAppointment'])->name('validateAppointment')->middleware('doctor');

Route::get('/doctor/appiontment/{id}/edit', [App\Http\Controllers\DoctorContorller::class, 'appointmentCompleteInfos'])->name('appointmentCompleteInfos')->middleware('doctor');
Route::put('/doctor/complete/info/{id}', [App\Http\Controllers\DoctorContorller::class, 'updateAppointmentCompleteInfos'])->name('updateAppointmentCompleteInfos')->middleware('doctor');

Route::get('/full-calender-Doctor', [App\Http\Controllers\DoctorContorller::class, 'fullCalender'])->name('fullCalender')->middleware('doctor');


//patient routes
Route::get('/patient/panel', [App\Http\Controllers\PatientController::class, 'index'])->name('patient')->middleware('patient');
Route::post('/search/doctor/fixer/{id}', [App\Http\Controllers\PatientController::class, 'fixerAppointment'])->name('fixerAppointment')->middleware('patient');
Route::put('/appointment/update/{appointment}/{id}', [App\Http\Controllers\PatientController::class, 'appointmentUpdate'])->name('appointmentUpdate')->middleware('patient');
Route::delete('/patien/deleteAppointment/{id}', [App\Http\Controllers\PatientController::class, 'deleteAppointment'])->name('deleteAppointment')->middleware('patient');

Route::get('/patient/appointment/pdf/{id}', [App\Http\Controllers\PatientController::class, 'downloadRecu'])->name('downloadRecu')->middleware('patient');
//admin routes
Route::get('/admin/panel', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/admin/panel/users', [App\Http\Controllers\AdminController::class, 'users'])->name('usersGestion')->middleware('admin');
Route::get('/admin/charts', [App\Http\Controllers\AdminController::class, 'usersType'])->name('usersType')->middleware('admin');
Route::post('/admin/add/users', [App\Http\Controllers\AdminController::class, 'addUser'])->name('addUser')->middleware('admin');


