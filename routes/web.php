<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('login','index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout','logout')->name('logout');
    Route::get('dashboard','dashboard')->name('dashboard');

    Route::post('validate_registration','validate_registration')->name('auth.validate_registration');

    Route::post('validate_login','validate_login')->name('auth.validate_login');

    

});