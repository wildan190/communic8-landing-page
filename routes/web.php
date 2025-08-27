<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\Web\AboutController::class, 'index'])->name('about.index');
Route::get('/portofolio', [App\Http\Controllers\Web\PortofolioController::class, 'index'])->name('portofolio.index');

// Route::get('/', function () {
//     return view('welcome');
// });
