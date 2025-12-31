<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DahsboardController;

// Route::view('/', 'welcome');

Route::get('/', HomeController::class . '@index')->name('home');

Route::get('/about', AboutController::class . '@index')->name('about');
Route::get('/service', ServiceController::class . '@index')->name('service');
Route::get('/contact', ContactController::class . '@index')->name('contact');
Route::get('/faq', FaqController::class . '@index')->name('faq');

//protected routes

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', DahsboardController::class . '@index')->name('admin_dashboard');
    Route::resource('/admin/articles', ArticleController::class)->middleware('auth');
    Route::get('/admin/settings', SettingController::class . '@index')->name('settings.index');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
