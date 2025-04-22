<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request
Route::middleware('auth:sanctum')->group(funtion({
    Route::prefix('attendance')->group(function (){
        Route::post('/clock-in', [AttandanceController::class, 'create' ]);
        Route::post('/clock-out', [AttandanceController::class, 'clockOut' ]);

    });
}));
