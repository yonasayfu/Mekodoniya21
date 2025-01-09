<?php

use App\Http\Controllers\CateringController;
use App\Http\Controllers\DonationAgreementController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ElderController;
use App\Http\Controllers\ElderSupporterMatchController; // Consider renaming this controller to MatchingController
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VisitLogController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resources (Alphabetical Order)
Route::resource('caterings', CateringController::class);
Route::resource('donation-agreements', DonationAgreementController::class);
Route::resource('donations', DonationController::class);
Route::resource('elders', ElderController::class);
Route::resource('elder-supporter-matches', ElderSupporterMatchController::class); // Rename this route to 'matchings' if you rename the controller/model
Route::resource('events', EventController::class);
Route::resource('facilities', FacilityController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('photo-galleries', PhotoGalleryController::class);
Route::resource('reports', ReportController::class);
Route::resource('settings', SettingController::class);
Route::resource('staff', StaffController::class);
Route::resource('supporters', SupporterController::class);
Route::resource('visit-logs', VisitLogController::class);

require __DIR__ . '/auth.php';
