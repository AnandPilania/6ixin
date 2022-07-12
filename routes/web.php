<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Central as Controllers;

Route::group([
    'middleware' => ['web'], // See the middleware group in Http Kernel
    'as' => 'central.',
], function () {
  Route::get('/', [Controllers\LandingController::class, 'mainLanding'])->name('landing');
  Route::get('/blog', [Controllers\BlogController::class, 'mainBlog'])->name('blog');
  Route::get('/contact', [Controllers\ContactController::class, 'mainContact'])->name('contact');
  Route::get('/info', [Controllers\InfoController::class, 'mainInfo'])->name('info');
  Route::get('/services', [Controllers\ServicesController::class, 'mainServices'])->name('services');
  Route::get('/domain', [Controllers\SearchDomainController::class, 'domainSearch'])->name('search.domain');
  Route::get('/help', [Controllers\HelpController::class, 'mainHelp'])->name('help');
  Route::get('/careers', [Controllers\CareersController::class, 'mainCareers'])->name('careers');
  Route::get('/discover', [Controllers\DiscoverController::class, 'mainDiscover'])->name('discover');


});

Route::get('/6', function () {
    return view('6');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
