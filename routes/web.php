<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SweetAlertController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\VideoController;

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
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student-fetch', [StudentController::class, 'fetchStudent']);
Route::delete('/delete/{id}',[StudentController::class, 'delete']);
Route::get('/auto', [StudentController::class, 'store_addr'])->name('student.store.addr');
Route::get('/jquery', [StudentController::class, 'jquery'])->name('jquery');
Route::delete('delete-all', [StudentController::class, 'removeMulti']);


// Route::get('/send-notification', [NotificationController::class, 'send_Offer_Notificatio']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/sweetalert', [SweetAlertController::class, 'sweetalert'])->name('sweetalert');
Route::post('/sweetalert_email_store', [SweetAlertController::class, 'sweetalert_email_store'])->name('sweetalert_email_store');
Route::get('/sweetalert_2', [SweetAlertController::class, 'sweetalert_2'])->name('sweetalert_2');



// Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
Route::get('/sendbasicemail',[MailController::class, 'basic_email']);

Route::post('uploadVideo', [VideoController::class,'uploadVideo'])->name('video.store');
Route::get('uploadVideo/index', [VideoController::class,'index'])->name('videos.index');