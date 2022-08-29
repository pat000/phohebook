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

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * get data from ssr datatables
 */
Route::get('getUsers', [App\Http\Controllers\DashboardController::class, 'getUsers'])->name('users.data');
Route::get('getContacts', [App\Http\Controllers\ContactController::class, 'getContacts'])->name('contacts.data');
Route::get('user/{user_id}/view-contacts', [App\Http\Controllers\ContactController::class, 'getLazyContacts'])->name('contacts.lazyload');


/**
 * resource
 */

Route::resource('contacts', App\Http\Controllers\ContactController::class);