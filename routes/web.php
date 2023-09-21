<?php

use App\Http\Controllers\PassworkController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('passgroups', App\Http\Controllers\PassgroupController::class);
Route::resource('passworks', App\Http\Controllers\PassworkController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
