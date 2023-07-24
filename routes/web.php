<?php

use App\Http\Livewire as Components;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('jobs')
    ->name('jobs.')
    ->group(function () {
        Route::get('/', Components\Jobs\Index::class)->name('index');
        Route::get('/{job}', Components\Jobs\Show::class)->name('show');
    });
