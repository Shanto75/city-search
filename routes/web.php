<?php

use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('admin', AdminController::class);

Route::get('/', [AdminController::class, 'home']);
Route::get('citylist/{stateid}', [AdminController::class, 'citylist']);

Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
Route::post('admin/saveCity', [AdminController::class, 'store'])->name('admin.save.city');

Route::get('admin/citydata/{id}', [AdminController::class, 'citydata'])->name('admin.get.citydata');

Route::get('search/{data}', [AdminController::class, 'search'])->name('search');