<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
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
Route::post('/contact', [App\Http\Controllers\Web\ContactController::class, 'store'])->name('contact.store');
Route::get('/layanan/brand-forge', [App\Http\Controllers\Web\LayananController::class, 'brandForge'])->name('layanan.brand-forge');
Route::get('/layanan/digital-compass', [App\Http\Controllers\Web\LayananController::class, 'digitalCompass'])->name('layanan.digital-compass');
Route::get('/layanan/digital-architecture', [App\Http\Controllers\Web\LayananController::class, 'digitalArchitecture'])->name('layanan.digital-architecture');
Route::get('/layanan/public-presence', [App\Http\Controllers\Web\LayananController::class, 'publicPresence'])->name('layanan.public-presence');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';
