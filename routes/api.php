<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées par authentification Sanctum
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('events', EventController::class);
    Route::apiResource('reservations', ReservationController::class);

    // Liste des réservations d’un utilisateur connecté
    Route::get('/my-reservations', function () {
        return auth()->user()->reservations()->with('event')->get();
    });

    // Liste des réservations pour un événement donné (admin ou organisateur)
    Route::get('/events/{event}/reservations', [ReservationController::class, 'index'])
        ->middleware('can:view,event');
});
