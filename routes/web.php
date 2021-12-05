<?php

use App\Http\Controllers\PostController;
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



Route::get('/chart', [PostController::class, 'chart'])->name('chart');

Route::get('/map1', function () {
    return Inertia::render('Map1');
})->name('map1');

Route::get('/map2', function () {
    return Inertia::render('Map2');
})->name('map2');

Route::get('/index', [PostController::class, 'index'])->name('index');




// Route::get('file-import-export', [UserController::class, 'fileImportExport']);
// Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
// Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
