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


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::get('/qrcode/{id}', [\App\Http\Controllers\StudentController::class, 'qrDownload'])->name('qrcode');
    Route::get('/reader/{id}', [\App\Http\Controllers\StudentController::class, 'qrReader'])->name('qrcode.reader');
});
