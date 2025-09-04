<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InsightController;
use App\Http\Controllers\Web\LayananController;
use App\Http\Controllers\Web\PortofolioController;
use App\Http\Controllers\WebInformationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/insight', [InsightController::class, 'index'])->name('insight.index');

// Rute Kontak dengan throttle
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Batasi 60 request per menit untuk rute POST /contact
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:60,1')
    ->name('contact.store');

// Rute Layanan lainnya
Route::get('/layanan/brand-forge', [LayananController::class, 'brandForge'])->name('layanan.brand-forge');
Route::get('/layanan/digital-compass', [LayananController::class, 'digitalCompass'])->name('layanan.digital-compass');
Route::get('/layanan/digital-architecture', [LayananController::class, 'digitalArchitecture'])->name('layanan.digital-architecture');
Route::get('/layanan/public-presence', [LayananController::class, 'publicPresence'])->name('layanan.public-presence');

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

    // Clients
    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    Route::get('/web-information', [WebInformationController::class, 'index'])->name('web_information.index');
    Route::get('/web-information/create', [WebInformationController::class, 'create'])->name('web_information.create');
    Route::post('/web-information', [WebInformationController::class, 'store'])->name('web_information.store');
    Route::get('/web-information/{webInformation}/edit', [WebInformationController::class, 'edit'])->name('web_information.edit');
    Route::put('/web-information/{webInformation}', [WebInformationController::class, 'update'])->name('web_information.update');
});

require __DIR__.'/auth.php';
