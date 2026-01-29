<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

// Company Authentication Routes
Route::prefix('company')->group(function () {
    Route::get('register', [App\Http\Controllers\CompanyAuthController::class, 'showCompanyRegistrationForm'])->name('company.register.form');
    Route::post('register', [App\Http\Controllers\CompanyAuthController::class, 'registerCompany'])->name('company.register');
    Route::get('login', [App\Http\Controllers\CompanyAuthController::class, 'showCompanyLoginForm'])->name('company.login.form');
    Route::post('login', [App\Http\Controllers\CompanyAuthController::class, 'loginCompany'])->name('company.login');
});

// Job Seeker Authentication Routes
Route::prefix('jobseeker')->group(function () {
    Route::get('register', [App\Http\Controllers\JobSeekerAuthController::class, 'showJobSeekerRegistrationForm'])->name('jobseeker.register.form');
    Route::post('register', [App\Http\Controllers\JobSeekerAuthController::class, 'registerJobSeeker'])->name('jobseeker.register');
    Route::get('login', [App\Http\Controllers\JobSeekerAuthController::class, 'showJobSeekerLoginForm'])->name('jobseeker.login.form');
    Route::post('login', [App\Http\Controllers\JobSeekerAuthController::class, 'loginJobSeeker'])->name('jobseeker.login');
    Route::post('logout', [App\Http\Controllers\JobSeekerAuthController::class, 'logoutJobSeeker'])->name('jobseeker.logout');
});

// Dashboard routes for different user types
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('jobseeker/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth:job_seeker', 'verified'])
    ->name('jobseeker.dashboard');

require __DIR__.'/settings.php';
