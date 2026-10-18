<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactMessageController;

Route::get('/', [WebsiteController::class, 'home'])->name('home');

Route::get('/company-profile', [WebsiteController::class, 'profile'])->name('profile');

Route::get('/products-services', [WebsiteController::class, 'products'])->name('products');

Route::get('/articles', [WebsiteController::class, 'articles'])->name('articles');

Route::get('/articles/{article:slug}', [WebsiteController::class, 'article'])->name('articles.show');

Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');

Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactMessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.send');