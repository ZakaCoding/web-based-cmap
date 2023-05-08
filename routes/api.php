<?php

use App\Http\Controllers\AssignmentCheckController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentLoadController;
use App\Http\Controllers\CmapDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post(
    '/submit-cmap',
    CmapDataController::class
);

Route::post(
    '/create-assignment',
    AssignmentController::class
)->name('create.assignment');

Route::get(
    '/load-cmap/{key}',
    AssignmentLoadController::class
);

Route::get(
    '/assignment-check/{cmapID}',
    AssignmentCheckController::class
);
