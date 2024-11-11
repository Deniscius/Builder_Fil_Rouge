<?php

// routes/web.php

// routes/web.php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OuvrierController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour les projets
Route::resource('projets', ProjetController::class)->only(['index', 'store', 'update', 'destroy']);
Route::get('projets/{id}/gerer', [ProjetController::class, 'gerer'])->name('projets.gerer');

// Routes pour les services
Route::get('/projets/{projetId}/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/projets/{projetId}/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

// Routes pour les ouvriers
Route::get('services/{serviceId}/ouvriers', [OuvrierController::class, 'index'])->name('ouvriers.index');
Route::get('services/{serviceId}/ouvriers/create', [OuvrierController::class, 'create'])->name('ouvriers.create');
Route::post('ouvriers', [OuvrierController::class, 'store'])->name('ouvriers.store');
Route::get('ouvriers/{id}/edit', [OuvrierController::class, 'edit'])->name('ouvriers.edit');
Route::put('ouvriers/{id}', [OuvrierController::class, 'update'])->name('ouvriers.update');
Route::delete('ouvriers/{id}', [OuvrierController::class, 'destroy'])->name('ouvriers.destroy');

// Routes pour les ressources
Route::get('projets/{projetId}/ressources', [RessourceController::class, 'index'])->name('ressources.index');
Route::get('projets/{projetId}/ressources/create', [RessourceController::class, 'create'])->name('ressources.create');
Route::post('ressources', [RessourceController::class, 'store'])->name('ressources.store');
Route::get('ressources/{id}/edit', [RessourceController::class, 'edit'])->name('ressources.edit');
Route::put('ressources/{id}', [RessourceController::class, 'update'])->name('ressources.update');
Route::delete('ressources/{id}', [RessourceController::class, 'destroy'])->name('ressources.destroy');

// Routes pour les opérations
Route::get('projets/{projetId}/operations', [OperationController::class, 'index'])->name('operations.index');
Route::get('projets/{projetId}/operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('operations', [OperationController::class, 'store'])->name('operations.store');
Route::get('operations/{id}/edit', [OperationController::class, 'edit'])->name('operations.edit');
Route::put('operations/{id}', [OperationController::class, 'update'])->name('operations.update');
Route::delete('operations/{id}', [OperationController::class, 'destroy'])->name('operations.destroy');
