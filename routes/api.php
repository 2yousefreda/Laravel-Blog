<?php

use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/posts',postController::class);

Route::get('/posts', function (Request $request) {
    return $request->post();
})->middleware('auth:sanctum');
