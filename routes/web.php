<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ApplicationController,
    DashboardController,
    ResumeController,
    UserController
};

Route::get('/', function () {
    return view('welcome');
});

// Job Applications
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications/status/{status}', [ApplicationController::class, 'filterByStatus'])->name('applications.status');

// Dashboards
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resumé Upload
Route::get('/resume/upload', [ResumeController::class, 'uploadForm'])->name('resume.upload');
Route::post('resume/upload', [ResumeController::class, 'store'])->name('resume.store');

// Profile Settings
Route::get('/profile/settings', [UserController::class, 'settings'])->name('profile.settings');