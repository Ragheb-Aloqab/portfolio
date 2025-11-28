<?php

use Illuminate\Support\Facades\Route;

// =============================
// Default Redirect to English
// =============================
Route::redirect('/', '/en');


// =============================
// Frontend Routes With Locale
// =============================
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ContactController;

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|ar']
], function () {


    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});


// =============================
// Admin Dashboard
// =============================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ContactMessageController;

// Redirect /admin → /admin/dashboard
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD
    Route::resource('projects', AdminProjectController::class);
    Route::resource('skills', AdminSkillController::class)->except(['show']);

    // Profile
    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // Change Password + Email  ⬅ التصحيح هنا
    Route::post('profile/update-password', [AdminProfileController::class, 'updatePassword'])
        ->name('profile.updatePassword');

    Route::post('profile/update-email', [AdminProfileController::class, 'updateEmail'])
        ->name('profile.updateEmail');

    // Messages
    Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{id}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{id}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Delete project image
    Route::delete('projects/delete-image/{id}', [AdminProjectController::class, 'deleteImage'])
        ->name('projects.deleteImage');
});



// =============================
// Laravel Breeze Auth Routes
// =============================
require __DIR__ . '/auth.php';
