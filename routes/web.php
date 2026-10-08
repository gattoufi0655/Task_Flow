<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Nouvelle route 
Route::get('/taskflow', function () {
    return "Bienvenue sur TaskFlow !";
});

Route::get('/a-propos', function () {
    return "A propos de TaskFlow ";
})-> name('about');

Route::get('/contact', function () {
    return "Page de contact";
})->name('contact');

Route::get('/presentation', function () {
    return view('presentation');
})->name('presentation');

Route::get('/services', function () {
    return response()->json([
        'service1' => 'Gestion des projets',
        'service2' => 'Gestion des tâches',
        'service3' => 'Gestion du temps'
    ]);
});

// Routes de l'application (préfixe /app)
// Route resource pour les projets // Route resource pour les taches
Route::prefix('app')->name('app.')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projets', ProjetController::class);
    Route::resource('taches', TacheController::class);
});

// Routes API (préfixe /api)
Route::prefix('api')->name('api.')->group(function() {
    Route::get('/projets', [ProjetController::class, 'index'])
        ->name('projets.index');
    Route::get('/taches', [TacheController::class, 'index'])
        ->name('taches.index');
});
