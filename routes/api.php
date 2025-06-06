<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/check-resume', [ApiController::class, 'checkResume']);
