<?php

use App\Http\Controllers\Concept\MapPreviewController;
use App\Http\Controllers\Concept\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get(
    '/dashboard', 
    [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get(
    '/release-notes',
    [DashboardController::class, 'releasePages']
)->middleware(['auth', 'verified'])->name('dashboard.release');

// Route::name('project.')->prefix('/project')->middleware(['auth', 'verified'])->group(function () {
// });

Route::get(
    '/project',
    [ProjectController::class, 'index']
)->middleware(['auth', 'verified'])->name('project');

Route::get('/assignment', function() {
    return view('assignment');
})->middleware(['auth', 'verified'])->name('assignment');

/**
 * Route Concept Map
 */
Route::get(
    '/concept-map/{key}',
    [MapPreviewController::class, 'index']
)->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
