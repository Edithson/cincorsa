<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;

Route::get('/', HomeController::class . '@index')->name('home');

Route::get('/about', AboutController::class . '@index')->name('about');
Route::get('/service', ServiceController::class . '@index')->name('service');
Route::get('/contact', ContactController::class . '@index')->name('contact');
Route::get('/faq', FaqController::class . '@index')->name('faq');

