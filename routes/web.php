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

Route::post('/post/store', [PostController::class, 'store'])->name('store');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,

    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/chart', [ServiceController::class, 'chart'])->name('chart');

Route::middleware(['auth:sanctum', 'verified'])->get('/map1', function () {
    return Inertia::render('Map1');
})->name('map1');

Route::middleware(['auth:sanctum', 'verified'])->post('/post/update/{id}', [PostController::class, 'update'])->name('update');

Route::middleware(['auth:sanctum', 'verified'])->get('/post/edit/{id}', [PostController::class, 'edit'])->name('edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/post/show/{id}', [PostController::class, 'show'])->name('show');

Route::middleware(['auth:sanctum', 'verified'])->delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('delete');



Route::middleware(['auth:sanctum', 'verified'])->get('/post/create', [PostController::class, 'create'])->name('create');



Route::middleware(['auth:sanctum', 'verified'])->get('/map2', [ServiceController::class, 'map'])->name('chart');

Route::middleware(['auth:sanctum', 'verified'])->get('/index', [ServiceController::class, 'index'])->name('index');




// Route::get('file-import-export', [UserController::class, 'fileImportExport']);
// Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
// Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
