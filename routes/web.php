<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});



Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/fuel', function() {
        return view('manage.fuel.index');
    })->name('fuel');

    Route::get('/fuel/create', function() {
        return view('manage.fuel.create');
    })->middleware('role.admin')->name('fuel.create');

    Route::get('/fuel/{id}', function() {
        return view('manage.fuel.show');
    })->middleware('role.admin')->name('fuel.show');

    Route::get('/fuel/edit/{id}', function() {
        return view('manage.fuel.edit');
    })->middleware('role.admin')->name('fuel.edit');

   


    // Transaction Management
    Route::get('/transactions', function() {
        return view('manage.transaction.index');
    })->name('transaction');

    Route::get('/transactions/{id}', function() {
        return view('manage.transaction.show');
    })->middleware('role.admin')->name('transaction.show');

});

require __DIR__.'/auth.php';
