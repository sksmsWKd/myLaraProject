<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/chart', [ServiceController::class, 'chart'])->name('chart');

Route::get('/map2', [ServiceController::class, 'map'])->name('map');

Route::get('/index', [ServiceController::class, 'index'])->name('index');

Route::get('/question', [ServiceController::class, 'question'])->name('question');


Route::get('/', function () {
    return Inertia::render('Mainbox', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,

    ]);
})->name('main');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/t', function () {
    event(new \App\Events\SendMessage());
    dd('Event Run Successfully.');
});


Route::get('/map1', function () {
    return Inertia::render('Map1');
})->name('map1');


// 게시판은 등록된 회원만,
Route::middleware(['auth:sanctum', 'verified'])->post('/post/update/{id}', [PostController::class, 'update'])->name('update');

Route::middleware(['auth:sanctum', 'verified'])->get('/post/edit/{id}', [PostController::class, 'edit'])->name('edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/post/show/{id}', [PostController::class, 'show'])->name('show');

Route::middleware(['auth:sanctum', 'verified'])->delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('delete');

Route::middleware(['auth:sanctum', 'verified'])->post('/post/store', [PostController::class, 'store'])->name('store');

Route::middleware(['auth:sanctum', 'verified'])->get('/post/create', [PostController::class, 'create'])->name('create');
