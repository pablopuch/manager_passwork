<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassworkController;
use App\Http\Controllers\PassgroupController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PasswordGeneratorController;
use App\Http\Controllers\SocialiteController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('passgroups', PassgroupController::class)->middleware('auth');
Route::resource('passworks', PassworkController::class)->middleware('auth');

// Route::post('generator', [PasswordGeneratorController::class, 'generatePassword'])->name('passwork.generate');

// Route::get('/home', [PassworkController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [PassworkController::class, 'index']);
});


Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);