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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return Inertia\Inertia::render('About');
})->name('about');

Route::get('/contactus', function () {
    return Inertia\Inertia::render('Contactus');
})->name('contactus');

Route::resource('category', App\Http\Controllers\CategoryController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::resource('posts', App\Http\Controllers\PostController::class);