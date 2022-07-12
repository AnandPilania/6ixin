<?php

use Illuminate\Support\Facades\Route;
use Modules\Engine\Http\Controllers\Central as Controllers;

Route::group([
    'middleware' => ['web'], // See the middleware group in Http Kernel
    'as' => 'central.',
], function () {
  // Route::get('/about', [Controllers\HomeController::class, 'about'])->name('about');

});

Route::prefix('engine')->group(function() {
    Route::get('/', 'EngineController@index');
});
