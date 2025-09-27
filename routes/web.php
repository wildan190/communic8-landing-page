<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandForgeContentController;
use App\Http\Controllers\DigitalCompassContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicPresenceContentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\TestimoniController;
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
Route::get('/insight/{slug}', [InsightController::class, 'show'])->name('insight.show');

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

    Route::get('/branch-offices', [\App\Http\Controllers\BranchOfficeController::class, 'index'])->name('branch-offices.index');
    Route::get('/branch-offices/create', [\App\Http\Controllers\BranchOfficeController::class, 'create'])->name('branch-offices.create');
    Route::post('/branch-offices', [\App\Http\Controllers\BranchOfficeController::class, 'store'])->name('branch-offices.store');
    Route::get('/branch-offices/{branchOffice}/edit', [\App\Http\Controllers\BranchOfficeController::class, 'edit'])->name('branch-offices.edit');
    Route::put('/branch-offices/{branchOffice}', [\App\Http\Controllers\BranchOfficeController::class, 'update'])->name('branch-offices.update');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

    Route::get('testimonies', [TestimoniController::class, 'index'])->name('testimonies.index');
    Route::get('testimonies/create', [TestimoniController::class, 'create'])->name('testimonies.create');
    Route::post('testimonies', [TestimoniController::class, 'store'])->name('testimonies.store');
    Route::get('testimonies/{testimoni}/edit', [TestimoniController::class, 'edit'])->name('testimonies.edit');
    Route::put('testimonies/{testimoni}', [TestimoniController::class, 'update'])->name('testimonies.update');
    Route::delete('testimonies/{testimoni}', [TestimoniController::class, 'destroy'])->name('testimonies.destroy');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/brandforge', [BrandForgeContentController::class, 'form'])->name('brandforge.form');
    Route::post('/brandforge/save', [BrandForgeContentController::class, 'save'])->name('brandforge.save');

    Route::get('services/subservices', [SubServiceController::class, 'index'])->name('subservices.index');
    Route::get('services/subservices/create', [SubServiceController::class, 'create'])->name('subservices.create');
    Route::post('services/subservices', [SubServiceController::class, 'store'])->name('subservices.store');
    Route::get('services/subservices/{subservice}/edit', [SubServiceController::class, 'edit'])->name('subservices.edit');
    Route::put('services/subservices/{subservice}', [SubServiceController::class, 'update'])->name('subservices.update');
    Route::delete('services/subservices/{subservice}', [SubServiceController::class, 'destroy'])->name('subservices.destroy');

    Route::get('/public-presence', [PublicPresenceContentController::class, 'index'])->name('public-presence.index');
    Route::post('/public-presence', [PublicPresenceContentController::class, 'storeOrUpdate'])->name('public-presence.storeOrUpdate');

    Route::get('/digital-compass-content', [DigitalCompassContentController::class, 'index'])->name('digital.compass.index');
    Route::post('/digital-compass-content/save', [DigitalCompassContentController::class, 'createOrUpdate'])->name('digital.compass.save');
});

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

require __DIR__ . '/auth.php';
