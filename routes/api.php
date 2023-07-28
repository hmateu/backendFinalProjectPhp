<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Ticket_TypeController;
use App\Http\Controllers\Role_User_Controller;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

// Saludo
Route::get('/saludo', function(){
    return response()->json([
        'success'=> true,
        'message'=> 'Hola'
    ],Response::HTTP_OK);
});

// Auth controllers
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
Route::put('/auth/profile-update', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// User controllers
Route::get('/users', [UserController::class, 'getAllUsers'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/user/{id}', [UserController::class, 'getUserById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/user/name/{name}', [UserController::class, 'getUserByName'])->middleware(['auth:sanctum', 'isAdmin']);
Route::delete('/user/delete', [UserController::class, 'deleteMyAccount'])->middleware(['auth:sanctum', 'isAdmin']);
Route::post('/user/restore/{id}', [UserController::class, 'restoreAccount'])->middleware(['auth:sanctum', 'isAdmin']);
Route::delete('/user/{id}', [UserController::class, 'deleteUserById'])->middleware(['auth:sanctum','isAdmin']);

// Role_User Controller
Route::post('/role-user', [Role_User_Controller::class, 'createRoleUser'])->middleware(['auth:sanctum','isAdmin']);
Route::put('/role-user/update', [Role_User_Controller::class, 'updateRoleUser'])->middleware(['auth:sanctum','isAdmin']);

// Attraction controllers
Route::get('/attractions', [AttractionController::class, 'getAllAttractions']);
Route::get('/attraction/name/{name}', [AttractionController::class, 'getAttractionByName']);
Route::post('/attraction', [AttractionController::class, 'createAttraction'])->middleware(['auth:sanctum', 'isAdmin']);
Route::put('/attraction/update', [AttractionController::class, 'updateAttraction'])->middleware(['auth:sanctum', 'isEmployee']);
Route::get('/attraction/{id}', [AttractionController::class, 'getAttractionById']);
Route::delete('/attraction/{id}', [AttractionController::class, 'deleteAttraction'])->middleware(['auth:sanctum','isAdmin']);

// Employee controllers
Route::get('/employees', [EmployeeController::class, 'getAllEmployees'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/employee/{id}', [EmployeeController::class, 'getEmployeeById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::post('/employee', [EmployeeController::class, 'createEmployee'])->middleware(['auth:sanctum', 'isAdmin']);

// Ticket_Type controllers
Route::get('/ticket-type', [Ticket_TypeController::class, 'getAllTicket_Type']);
Route::get('/ticket-type/{id}', [Ticket_TypeController::class, 'getTicket_TypeById'])->middleware(['auth:sanctum', 'isAdmin']);
Route::get('/ticket-type/name/{name}', [Ticket_TypeController::class, 'getTicket_TypeByName']);

// Ticket controllers
Route::get('/tickets', [TicketController::class, 'getAllTickets'])->middleware(['auth:sanctum', 'isAdmin']);
Route::delete('/ticket/{id}', [TicketController::class, 'deleteTicket'])->middleware(['auth:sanctum', 'isAdmin']);