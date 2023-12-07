<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/items', ItemController::class);
// Route::resource('/item ', ItemController::class,);

Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/index', [ItemController::class, 'index'])->name('index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/items/{item}', [ItemController::class, 'show'])->name('show');

// Route::get('/items/{item}/edit', 'ItemController@edit')->name('items.edit');
Route::get('/items/{item}/edit', [ItemController::class,'edit'])->name('items.edit');
