<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
Route::resource('student', \App\Http\Controllers\StudentController::class);

Route::get('/attend', [App\Http\Controllers\AttendanceController::class, 'home'])->name('attendance');
Route::post('/attend', [App\Http\Controllers\AttendanceController::class, 'qrcode'])->name('attendance.post');

//Route::get('/example', [\App\Http\Controllers\HomeController::class,'example'])->name('example');
