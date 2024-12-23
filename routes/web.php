<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::name('customer.')->controller(CustomerController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{customer}', 'edit')->name('edit');
    Route::put('/update/{customer}', 'update')->name('update');
    Route::delete('/delete/{customer}', 'destroy')->name('destroy');
});