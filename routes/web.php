<?php

use App\Http\Controllers\AuthenticationController;
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

Route::controller(AuthenticationController::class)->group(function(){
    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::post('login', 'authenticate');
});

Route::middleware('auth')->group(function(){

    // Route::controller(AuthenticationController::class)->group(function(){
    //     Route::get('login', 'index')->name('login')->middleware('guest');
    //     Route::post('login', 'authenticate');
    // });
    Route::get('/dashboard', function(){
        return view('Dashboard.dashboard');
    });

});