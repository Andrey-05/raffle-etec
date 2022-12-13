<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PurchasedTicketController;
use App\Http\Controllers\RaffleController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// MANAGERS
Route::post('/manager', [ManagerController::class, "create"]);

// RAFFLES
Route::post('/raffle', [RaffleController::class, "create"]);
Route::delete("/raffle/{id}", [RaffleController::class, "delete"]);

// PURCHASED TICKETS
Route::post("/ticket", [PurchasedTicketController::class, "create"]);
