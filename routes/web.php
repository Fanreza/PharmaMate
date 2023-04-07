<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

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



Auth::routes(['register' => false]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});