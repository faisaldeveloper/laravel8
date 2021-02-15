<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CategoryController;
//use App\Http\Controllers\TaskController;

use App\Http\Controllers\HomeController;

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



Route::get('home', [HomeController::class, 'index'])->name('index');
Route::get('home/fstest', function (){
	dd('sdfsdfs2888');
	//return view('welcome');
});

Route::post('home/mytest', [HomeController::class, 'mytest'])->name('home.mytest');

Route::get('/about', function () {
    return Inertia\Inertia::render('About');
})->name('about');

Route::get('/contactus', function () {
    return Inertia\Inertia::render('Contactus');
})->name('contactus');

Route::get('/movie', function () {
    //return view('welcome');
    return Inertia\Inertia::render('Movie');
})->name('movie');



Route::resource('category', CategoryController::class);
Route::resource('task', TaskController::class);
//Route::get('category/trello', [CategoryController::class, 'trello'])->name('trello');

//Route::get('category/trello', App\Http\Controllers\CategoryController::class)->name('trello');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::resource('posts', PostController::class);