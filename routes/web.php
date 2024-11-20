<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::name('customer')->controller(CustomerController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});