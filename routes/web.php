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

Route::get('/', [MovieController::class, 'index'])->name('/');

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');

Route::get('/movie/{id}', [MovieController::class, 'show']);

Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->middleware('auth');

Route::get('/movie/edit/{id}', [MovieController::class, 'edit'])->middleware('auth');

Route::put('/movie/update/{id}', [MovieController::class, 'update'])->middleware('auth');

Route::post('/movie', [MovieController::class, 'store']);

Route::post('/movie/tags/add/{movieId}/{tagId}', [MovieController::class, 'addTag'])->middleware('auth');

Route::delete('/movie/tags/remove/{movieId}/{tagId}', [MovieController::class, 'removeTag'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
