<?php

use App\Http\Controllers;
use App\Http\Livewire as Components;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

Route::get('/', function (): View {
    return view('welcome');
});

Route::prefix('jobs')
    ->name('jobs.')
    ->group(function (): void {
        Route::get('/', Components\Jobs\Index::class)->name('index');
        Route::get('/{job}', Components\Jobs\Show::class)->name('show');
    });

// Model binding
Route::controller(Controllers\JobController::class)
    ->group(function (): void {
        Route::get('test/job-as-id/{id}', 'asId');              // http://localhost:8088/test/job-as-id/1
        Route::get('test/job-as-model/{job}', 'asModel');       // http://localhost:8088/test/job-as-model/1
        Route::get('test/job-as-title/{job:title}', 'asTitle'); // http://localhost:8088/test/job-as-title/Ullam-qui
    });

// Response code
Route::get('empty-1', fn(): JsonResponse => new JsonResponse(null, 204));                       // bad manners
Route::get('empty-2', fn(): JsonResponse => new JsonResponse(null, Response::HTTP_NO_CONTENT)); // good

// php artisan config:clear - development mode
Route::get('config', fn(): string => config('app.name')); // http://localhost:8088/config

// php artisan config:cache - production mode
Route::get('env', fn(): string => env('APP_NAME')); // http://localhost:8088/env
