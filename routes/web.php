<?php

use App\Http\Controllers\UserController;
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

Route::get('/register', function () {
    return Inertia::render("register");
});

Route::get('/login', function () {
    return Inertia::render("login");
});

Route::get('/raffles', function () {
    return Inertia::render("allRaffles");
});

Route::get('/raffles/ranking', function () {
    return Inertia::render("ranking");
});

Route::get('/', function () {
    return Inertia::render("index");
});

Route::post('/user', [UserController::class, "create"]);
