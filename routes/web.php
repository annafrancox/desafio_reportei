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
Route::middleware('auth')->group(function ()
{
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Rotas para a User
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware('isAdmin');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware('isAdmin');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('isAdmin');
    Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('isAdmin');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware('isAdmin');

    //Rotas para a ContentBox
    Route::get('/contentbox', [App\Http\Controllers\ContentBoxController::class, 'index'])->name('contentbox.index');
    Route::get('/contentbox/create', [App\Http\Controllers\ContentBoxController::class, 'create'])->name('contentbox.create')->middleware('isAdmin');
    Route::post('/contentbox/upload', [App\Http\Controllers\AttachmentController::class, 'store'])->name('contentbox.upload')->middleware('isAdmin');
    Route::post('/contentbox/store', [App\Http\Controllers\ContentBoxController::class, 'store'])->name('contentbox.store')->middleware('isAdmin');
    Route::get('/contentbox/{contentbox}/show', [App\Http\Controllers\ContentBoxController::class, 'show'])->name('contentbox.show');
    Route::get('/contentbox/{contentbox}/edit', [App\Http\Controllers\ContentBoxController::class, 'edit'])->name('contentbox.edit')->middleware('isAdmin');
    Route::put('/contentbox/{contentbox}/update', [App\Http\Controllers\ContentBoxController::class, 'update'])->name('contentbox.update')->middleware('isAdmin');
    Route::delete('/contentbox/{contentbox}', [App\Http\Controllers\ContentBoxController::class, 'destroy'])->name('contentbox.destroy')->middleware('isAdmin');

    //Rotas para a Attachment
    Route::get('/download/{attachment}', [App\Http\Controllers\ContentBoxController::class, 'downloadAttachment'])->name('download');
    Route::delete('/contentbox/attachment/{attachment}', [App\Http\Controllers\ContentBoxController::class, 'destroyAttachment'])->name('attachment.destroy');
});
