<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    if (auth()->user()->role_id == 1) {
        return view('backend.home');
    }
    if (auth()->user()->role_id == 2) {
        return view('pharmacist.home');
    }
    return redirect()->route('login');
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('password');
    Route::post('password-update', [ProfileController::class, 'updatePassword'])->name('password.update');
});
