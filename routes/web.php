<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CategoryController;
//use App\Http\Controllers\TaskController;

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

Route::resource('category', CategoryController::class);
Route::resource('task', TaskController::class);
//Route::get('category/trello', [CategoryController::class, 'trello'])->name('trello');

//Route::get('category/trello', App\Http\Controllers\CategoryController::class)->name('trello');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::resource('posts', PostController::class);