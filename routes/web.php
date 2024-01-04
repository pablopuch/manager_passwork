<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassworkController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PasswordGeneratorController;


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

// Route::resource('passgroups', PassgroupController::class)->middleware('auth');
Route::resource('passworks', PassworkController::class)->middleware('auth');

Route::post('generator', [PasswordGeneratorController::class, 'generatePassword'])->name('passwork.generate');



Route::get('/home', [PassworkController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [PassworkController::class, 'index'])->name('home');
    Route::get('pdf', [PassworkController::class, 'pdf'])->name('passwork.pdf');
});


Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'google_token' => $user_google->token,
        'google_refresh_token' => $user_google->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/home');
});
