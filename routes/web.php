<?php

use App\Http\Controllers\BahagianController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\UserController;
use App\Models\Guru;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\WarningLetterController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Admin', function () {
    return view('Admin');
});

Route::get('/ahli', function () {
    $guru = Guru::all();
    dd($guru->toArray());
});

Route::resource('guru', GuruController::class);
Route::resource('murid', MuridController::class);
Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
Route::resource('warning_letters', WarningLetterController::class);
Route::resource('users', UserController::class)->middleware('isAdmin');
Route::post('user-update-role', [UserController::class, 'updateRole'])->name('users.update-role');
Route::resource('bahagian', BahagianController::class);
// Route for showing student details of a specific Bahagian
Route::get('/bahagian/{id}/murid', [BahagianController::class, 'showMurid'])->name('bahagian.showMurid');

// 1. Your custom “report all classes” route must come *before* the resource:
//    so it won’t be swallowed by the {kehadiran} wildcard.
Route::get('kehadiran/report-all', [KehadiranController::class, 'reportAll'])
    ->name('kehadiran.reportAll');

// 2. Now register the standard RESTful routes in one line.
//    We constrain the {kehadiran} parameter to digits so “report-all” never matches here.
Route::resource('kehadiran', KehadiranController::class)
    ->where(['kehadiran' => '[0-9]+']);;

Route::get('/warning-letters/{id}/download-pdf', [WarningLetterController::class, 'downloadPdf'])->name('warning_letters.downloadPdf');
Route::get(
    'warning_letters/{warning_letter}/send',
    [WarningLetterController::class, 'sendEmail']
)->name('warning_letters.send');

Route::get('/check-attendance-threshold', [KehadiranController::class, 'checkAttendanceThreshold'])->name('attendance.check-threshold');



Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);




// Route::get('/truncate', function () {
//     Guru::truncate();
// });
