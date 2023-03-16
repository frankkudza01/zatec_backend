<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/auth/register', [App\Http\Controllers\Authentication\RegisterController::class, 'store'])->name('/auth/register');
Route::post('/auth/login', [App\Http\Controllers\Authentication\LoginController::class, 'login'])->name('/auth/login');


Route::group(['middleware' => ['auth:sanctum']], function () {
    // Logout
    Route::post('/user/logout', [App\Http\Controllers\Authentication\LogoutController::class, 'logout'])->name('/user/logout');

    Route::post('/albums/create', [App\Http\Controllers\Albums\AlbumsController::class, 'store'])->name('/albums/create');
    Route::get('/albums/albums', [App\Http\Controllers\Albums\AlbumsController::class, 'index'])->name('/albums/albums');
    Route::get('/albums/show/{id}', [App\Http\Controllers\Albums\AlbumsController::class, 'show'])->name('/albums/show/');
    Route::post('/albums/update/{id}', [App\Http\Controllers\Albums\AlbumsController::class, 'update'])->name('/albums/update/');
    Route::get('/albums/destroy/{id}', [App\Http\Controllers\Albums\AlbumsController::class, 'destroy'])->name('/albums/destroy/');

    Route::get('/genres/genres', [App\Http\Controllers\Genres\GenreController::class, 'index'])->name('/genres/genres');
    Route::get('/genres/show/{id}', [App\Http\Controllers\Genres\GenreController::class, 'show'])->name('/genres/show/');

    Route::post('/songs/create', [App\Http\Controllers\Songs\SongsController::class, 'store'])->name('/songs/create');
    Route::get('/songs/songs', [App\Http\Controllers\Songs\SongsController::class, 'index'])->name('/songs/songs');
    Route::get('/songs/show/{id}', [App\Http\Controllers\Songs\SongsController::class, 'show'])->name('/songs/show/');
    Route::post('/songs/update/{id}', [App\Http\Controllers\Songs\SongsController::class, 'update'])->name('/songs/update/');
    Route::get('/songs/destroy/{id}', [App\Http\Controllers\Songs\SongsController::class, 'destroy'])->name('/songs/destroy/');
});
