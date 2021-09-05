<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;

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

Route::get('/contact', [ContactsController::class, 'index'])->name('contacts.index');
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('contacts.confirm');
Route::post('/thanks', [ContactsController::class, 'store'])->name('contacts.thanks');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/search', [AdminController::class, 'search']);
//タスクを削除
Route::delete('/admin/delete/{contact}', [AdminController::class, 'delete']);