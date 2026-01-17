<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\GuestController::class,'index'])->name('welcome');
Route::post('/contact', [App\Http\Controllers\GuestController::class,'contact'])->name('contact');

Route::get('/terms', [App\Http\Controllers\GuestController::class,'terms'])->name('terms');

// Route::get('/faq', [App\Http\Controllers\GuestController::class,'faq'])->name('faq');


Route::get('/cv/free', [App\Http\Controllers\FreeCvController::class,'index'])->name('cv.free');
Route::post('/cv/free', [App\Http\Controllers\FreeCvController::class,'create'])->name('cv.free.create');


Auth::routes();


Route::group(['middleware' => ['guest']], function () {

Route::get('/cv/verify', [App\Http\Controllers\FreeCvController::class,'verifyPhone'])->name('cv.free.verify');
Route::post('/cv/verify', [App\Http\Controllers\FreeCvController::class,'verify'])->name('cv.free.verify.check');

Route::get('/verify', [App\Http\Controllers\Auth\RegisterController::class,'verifyPhone'])->name('verify');

Route::post('/verify', [App\Http\Controllers\Auth\RegisterController::class,'verify'])->name('verify.check');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/CV', [App\Http\Controllers\CvController::class, 'index'])->name('cv.index');
    Route::post('/CV', [App\Http\Controllers\CvController::class, 'create'])->name('cv.create');

    Route::post('CV/verify', [App\Http\Controllers\CvController::class, 'verify'])->name('cv.payment.verify');

    Route::get('/CVs', [App\Http\Controllers\CvController::class, 'show'])->name('cv.show');

     
});


Route::get('/CVs/check', [App\Http\Controllers\CvController::class, 'domains'])->name('cv.domains');


