<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\V1\AuthController;

/// in one minuts only hit 60 request 
Route::prefix('web/v1/')->group(function () {

    Route::middleware(['throttle:10,1'])->get('verify-work-email', [AuthController::class, 'verifyWorkEmail']);
});