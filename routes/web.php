<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
// Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
// Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
// Route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);


Route::get('/home', [StudentController::class, 'index']);
// Route::post('/student', [StudentController::class, 'store']);
// Route::get('/student-fetch', [StudentController::class, 'fetchStudent']);
// Route::delete('/delete/{id}',[StudentController::class, 'delete']);
