<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

// User controllers
Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::get('/user/name/{name}', [UserController::class, 'getUserByName']);

// Attraction controllers
Route::get('/attractions', [AttractionController::class, 'getAllAttractions']);
Route::get('/attraction/{id}', [AttractionController::class, 'getAttractionById']);
Route::get('/attraction/name/{name}', [AttractionController::class, 'getAttractionByName']);
Route::post('/attraction', [AttractionController::class, 'createAttraction']);