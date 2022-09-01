<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function (){
    Route::get ('/','index')->name('welcome');
    Route::get('login','login')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout','logout')->name('logout');
    Route::get('dashboard','dashboard')->name('dashboard');

    Route::post('validate_registration','validate_registration')->name('auth.validate_registration');

    Route::post('validate_login','validate_login')->name('auth.validate_login');

    

});