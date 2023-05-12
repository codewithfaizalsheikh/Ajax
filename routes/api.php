<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/home', [StudentController::class, 'index']);

Route::post('/student', [StudentController::class, 'store'])->name('student.store');

Route::delete('/delete/{id}',[StudentController::class, 'deleteStudent'])->name('student.delete');

Route::get('/student-fetch', [StudentController::class, 'fetchStudent'])->name('student.fetch');

Route::post('/image/upload', [StudentController::class, 'image_upload'])->name('student.image');

Route::post('/address',[StudentController::class, 'address'])->name('student.address');

Route::get('/customer',[CustomerController::class, 'index'])->name('customer.index');
