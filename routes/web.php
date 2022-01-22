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
    return view('welcome');
});
Auth::routes();

Route::get('/', function () {
    return view('admin.layouts.app');
})->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas para a User
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

//Rotas para a ContentBox
Route::get('/contentbox', [App\Http\Controllers\ContentBoxController::class, 'index'])->name('contentbox.index');
Route::get('/contentbox/create', [App\Http\Controllers\ContentBoxController::class, 'create'])->name('contentbox.create');
Route::post('/contentbox/store', [App\Http\Controllers\ContentBoxController::class, 'store'])->name('contentbox.store');
Route::get('/contentbox/{contentBox}/edit', [App\Http\Controllers\ContentBoxController::class, 'edit'])->name('contentbox.edit');
Route::put('/contentbox/{contentBox}/update', [App\Http\Controllers\ContentBoxController::class, 'update'])->name('contentbox.update');
Route::delete('/contentbox/{contentBox}', [App\Http\Controllers\ContentBoxController::class, 'destroy'])->name('contentbox.destroy');
