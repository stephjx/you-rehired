<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Role selector route
Route::get('auth/role-selector', function () {
    return view('auth.role-selector');
})->name('auth.role.selector');

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

// Role switching routes
Route::middleware(['auth'])->group(function () {
    Route::get('role/switch', [App\Http\Controllers\RoleSwitchController::class, 'showSwitchForm'])->name('role.switch.form');
    Route::post('role/switch', [App\Http\Controllers\RoleSwitchController::class, 'switchRole'])->name('role.switch');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('companies', App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('jobseekers', App\Http\Controllers\Admin\JobSeekerController::class);
});

// Admin Authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
});

require __DIR__.'/settings.php';
