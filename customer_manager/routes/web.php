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
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');

//tao group route tasks
Route::group(['prefix' => 'customers'], function () {
    Route::get('/',[\App\Http\Controllers\CustomerController::class,'index'])->name('list');
    Route::get('/create',[\App\Http\Controllers\CustomerController::class,'create'])->name('create');
    Route::post('/create',[\App\Http\Controllers\CustomerController::class,'store'])->name('store');
    Route::get('/{id}/edit',[\App\Http\Controllers\CustomerController::class,'edit'])->name('edit');
    Route::post('/{id}/edit',[\App\Http\Controllers\CustomerController::class,'update'])->name('update');
    Route::get('/{id}/delete',[\App\Http\Controllers\CustomerController::class,'delete'])->name('delete');
    Route::post('/search',[\App\Http\Controllers\CustomerController::class,'search']);
});

