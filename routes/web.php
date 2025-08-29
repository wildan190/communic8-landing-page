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
Route::get('/insight', [App\Http\Controllers\Web\InsightController::class, 'index'])->name('insight.index');
Route::get('/contact', [App\Http\Controllers\Web\ContactController::class, 'index'])->name('contact.index');
Route::get('/layanan/brand-forge', [App\Http\Controllers\Web\LayananController::class, 'brandForge'])->name('layanan.brand-forge');
Route::get('/layanan/digital-compass', [App\Http\Controllers\Web\LayananController::class, 'digitalCompass'])->name('layanan.digital-compass');
Route::get('/layanan/digital-architecture', [App\Http\Controllers\Web\LayananController::class, 'digitalArchitecture'])->name('layanan.digital-architecture');
Route::get('/layanan/public-presence', [App\Http\Controllers\Web\LayananController::class, 'publicPresence'])->name('layanan.public-presence');

// Route::get('/', function () {
//     return view('welcome');
// });
