<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ApplicationController,
    DashboardController,
    ResumeController,
    UserController,
    SiteController
};

Route::get('/', [SiteController::class, 'actionIndex']);

// Job Applications
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/form', [ApplicationController::class, 'viewForm'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'createApplication'])->name('applications.createApplication');

// Dashboards
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resumé Upload
Route::get('/resume/upload', [ResumeController::class, 'view'])->name('resume.upload');
Route::post('/resume/upload', [ResumeController::class, 'uploadForm'])->name('resume.uploadFile');

// Profile Settings
Route::get('/profile/settings', [UserController::class, 'settings'])->name('profile.settings');