<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');

Route::get('/movie/{id}', [MovieController::class, 'show']);

Route::delete('/movie/{id}', [MovieController::class, 'destroy']);

Route::post('/movie', [MovieController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
