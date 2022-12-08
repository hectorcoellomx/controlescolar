<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', [ HomeController::class, 'index' ] );

Route::get('/login', [ AuthController::class, 'index' ] );
Route::post('/login', [ AuthController::class, 'login' ] );
Route::get('/logout', [ AuthController::class, 'logout' ] );

Route::get('/careers', [ CareerController::class, 'index' ] );
Route::get('/students', [ StudentController::class, 'index' ] );
Route::get('/students/create', [ StudentController::class, 'create' ] );
Route::post('/students', [ StudentController::class, 'store' ] );
Route::delete('/students', [ StudentController::class, 'destroy' ] );



