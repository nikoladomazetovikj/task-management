<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResources([
        'task' => \App\Http\Controllers\Api\TaskController::class,
    ]);

});
