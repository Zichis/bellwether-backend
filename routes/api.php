<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerRegistrationController;
use App\Http\Controllers\LocationTypeController;
use App\Http\Controllers\PendingCustomerController;
use App\Http\Controllers\ServicePlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/customer-registration', CustomerRegistrationController::class);
Route::middleware('auth:sanctum')->post('/customers', [CustomerController::class, 'store']);
Route::middleware('auth:sanctum')->get('/customers', [CustomerController::class, 'index']);
Route::middleware('auth:sanctum')->delete('/customers/{id}', [CustomerController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/customers/{id}', [CustomerController::class, 'show']);
Route::middleware('auth:sanctum')->patch('/customers/{id}', [CustomerController::class, 'update']);
Route::middleware('auth:sanctum')->get('/pending-customers', [PendingCustomerController::class, 'index']);
Route::middleware('auth:sanctum')->get('/pending-customers/{id}', [PendingCustomerController::class, 'show']);
Route::middleware('auth:sanctum')->post('/pending-customers/{id}/approve', [PendingCustomerController::class, 'approve']);
Route::get('/location-types', [LocationTypeController::class, 'index']);
Route::get('/service-plans', [ServicePlanController::class, 'index']);
