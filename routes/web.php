<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('home');
});


Route::get('/login', [ AuthController::class, 'index' ] );
Route::post('/login', [ AuthController::class, 'login' ] );
Route::get('/logout', [ AuthController::class, 'logout' ] );

Route::middleware(['authUser'])->group(function () {
    Route::get('/home', [ HomeController::class, 'index' ] );
    Route::get('/careers', [ CareerController::class, 'index' ] );
    Route::get('/students', [ StudentController::class, 'index' ] );
    Route::get('/students/create', [ StudentController::class, 'create' ] );
    Route::post('/students', [ StudentController::class, 'store' ] );
    Route::delete('/students/{id}', [ StudentController::class, 'destroy' ] );

});





