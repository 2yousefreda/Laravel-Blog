<?php

use App\Http\Controllers\postController;
use Illuminate\Database\Schema\PostgresSchemaState;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [postController::class,'index'])->name('posts.index');

Route::get('/posts/create', [postController::class,'create'])->name('posts.create');

Route::post('/posts', [postController::class,'store'])->name( 'posts.store');

Route::get('/posts/{post}/edit', [postController::class,'edit'])->name('posts.edit');

Route::put('/posts/{post}', [postController::class,'update'])->name('posts.update');



Route::get('/posts/{post}', [postController::class,'show'])->name('posts.show');
Route::delete('/posts/{post}', [postController::class,'destroy'])->name('posts.destroy');
