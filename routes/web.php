<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;

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




//Route::get('/', [MainController::class, 'home'])->name('home');
//Route::get('/about', [MainController::class, 'about'])->name('about');
//Route::get('/partnership', [MainController::class, 'partnership'])->name('partnership');
//Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
//Route::get('/gallery/{id}', [MainController::class, 'galleryDetail'])->name('galleryDetail');
//
//
//Route::get('/service/{slug}', [MainController::class, 'service'])->name('service');
//Route::get('/get-subservice-details/{id}', [MainController::class, 'getSubServiceDetails']);
//
//
//
//Route::get('/category/{id}', [MainController::class, 'category'])->name('category');
//Route::get('/post/{id}', [MainController::class, 'post'])->name('post');
//
//Route::get('/contact', [MainController::class, 'contact'])->name('contact');
//Route::post('/submit', [MainController::class, 'submit'])->name('form.submit');
//
//
//
//Route::get('/specialist', [MainController::class, 'specialist'])->name('specialist');
//Route::get('conclusion', [MainController::class, 'conclusion'])->name('conclusion');
//
//
//Route::get('/client', [MainController::class, 'client'])->name('client');
//
//Route::get('/service_footer', [MainController::class, 'service_footer'])->name('service.footer');




Route::get('/{lang?}', [MainController::class, 'home'])->where('lang', 'ru|en')->name('home');
Route::get('/{lang}/about', [MainController::class, 'about'])->where('lang', 'ru|en')->name('about');
Route::get('/{lang}/partnership', [MainController::class, 'partnership'])->where('lang', 'ru|en')->name('partnership');
Route::get('/{lang}/gallery', [MainController::class, 'gallery'])->where('lang', 'ru|en')->name('gallery');
Route::get('/{lang}/gallery/{id}', [MainController::class, 'galleryDetail'])->where('lang', 'ru|en')->name('galleryDetail');
Route::get('/{lang}/service/{slug}', [MainController::class, 'service'])->where('lang', 'ru|en')->name('service');
Route::get('/get-subservice-details/{id}', [MainController::class, 'getSubServiceDetails']);
Route::get('/{lang}/category/{id}', [MainController::class, 'category'])->where('lang', 'ru|en')->name('category');
Route::get('/{lang}/post/{id}', [MainController::class, 'post'])->where('lang', 'ru|en')->name('post');
Route::get('/{lang}/contact', [MainController::class, 'contact'])->where('lang', 'ru|en')->name('contact');
Route::post('/{lang}/submit', [MainController::class, 'submit'])->where('lang', 'ru|en')->name('form.submit');
Route::get('/{lang}/specialist', [MainController::class, 'specialist'])->where('lang', 'ru|en')->name('specialist');
Route::get('/{lang}/conclusion', [MainController::class, 'conclusion'])->where('lang', 'ru|en')->name('conclusion');
Route::get('/{lang}/client', [MainController::class, 'client'])->where('lang', 'ru|en')->name('client');
Route::get('/{lang}/service_footer', [MainController::class, 'service_footer'])->where('lang', 'ru|en')->name('service.footer');
Route::get('/{lang}/information', [MainController::class, 'information'])->where('lang', 'ru|en')->name('information');




Route::get('/{lang}', function ($lang){
    session()->put(['lang' => $lang]);
    return back();
})->where('lang', 'ru|en');


