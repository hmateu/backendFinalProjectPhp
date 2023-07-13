<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Price_ChangeController;
use App\Http\Controllers\Role_User_Controller;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

// Auth controllers
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/profile', [AuthController::class, 'profile'])->middleware(['auth:sanctum', 'isAdmin']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// User controllers
Route::get('/users', [UserController::class, 'getAllUsers'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/user/{id}', [UserController::class, 'getUserById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/user/name/{name}', [UserController::class, 'getUserByName'])->middleware(['auth:sanctum', 'isAdmin']);
Route::delete('/user/delete', [UserController::class, 'deleteMyAccount'])->middleware(['auth:sanctum', 'isAdmin']);
Route::post('/user/restore/{id}', [UserController::class, 'restoreAccount'])->middleware(['auth:sanctum', 'isAdmin']);

// Role_User Controller
Route::post('/role-user', [Role_User_Controller::class, 'createRoleUser'])->middleware(['auth:sanctum','isAdmin']);
Route::put('/role-user/update', [Role_User_Controller::class, 'updateRoleUser'])->middleware(['auth:sanctum','isAdmin']);

// Attraction controllers
Route::get('/attractions', [AttractionController::class, 'getAllAttractions']);
Route::get('/attraction/name/{name}', [AttractionController::class, 'getAttractionByName']);
Route::post('/attraction', [AttractionController::class, 'createAttraction'])->middleware(['auth:sanctum', 'isAdmin']);
Route::put('/attraction/update', [AttractionController::class, 'updateAttraction'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/attraction/{id}', [AttractionController::class, 'getAttractionById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::delete('/attraction/{id}', [AttractionController::class, 'deleteAttraction'])->middleware(['auth:sanctum','isAdmin']);

// Employee controllers
Route::get('/employees', [EmployeeController::class, 'getAllEmployees'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/employee/{id}', [EmployeeController::class, 'getEmployeeById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/employee/email/{email}', [EmployeeController::class, 'getEmployeeByEmail'])->middleware(['auth:sanctum', 'isAdmin']);
Route::post('/employee', [EmployeeController::class, 'createEmployee'])->middleware(['auth:sanctum', 'isAdmin']);

// Price_Change controllers
Route::get('/price-change', [Price_ChangeController::class, 'getAllPrice_Change']);
Route::get('/price-change/{id}', [Price_ChangeController::class, 'getPrice_ChangeById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/price-change/name/{name}', [Price_ChangeController::class, 'getPrice_ChangeByName']);

// Price_Change controllers
Route::get('/tickets', [TicketController::class, 'getAllTickets']);