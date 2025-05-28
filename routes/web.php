<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route d'accueil qui redirige vers le tableau de bord administrateur
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Routes du tableau de bord administrateur
Route::prefix('admin')->name('admin.')->group(function () {
    // Tableau de bord principal
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des clients
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [AdminController::class, 'listClients'])->name('list');
        Route::get('/add', [AdminController::class, 'addClientForm'])->name('add.form');
        Route::post('/add', [AdminController::class, 'addClient'])->name('add');
        Route::get('/{clientId}/edit', [AdminController::class, 'editClientForm'])->name('edit.form');
        Route::post('/{clientId}/edit', [AdminController::class, 'editClient'])->name('edit');
        Route::post('/{clientId}/deactivate', [AdminController::class, 'deactivateClient'])->name('deactivate');
        Route::get('/{clientId}/followed-items', [AdminController::class, 'listFollowedItems'])->name('followed-items');
    });
    
    // Gestion des abonnements
    Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
        Route::get('/', [AdminController::class, 'manageSubscriptions'])->name('manage');
        Route::get('/add', [AdminController::class, 'addSubscriptionForm'])->name('add.form');
        Route::post('/add', [AdminController::class, 'addSubscription'])->name('add');
        Route::get('/{subscriptionId}/edit', [AdminController::class, 'editSubscriptionForm'])->name('edit.form');
        Route::post('/{subscriptionId}/edit', [AdminController::class, 'editSubscription'])->name('edit');
        Route::post('/{subscriptionId}/suspend', [AdminController::class, 'suspendSubscription'])->name('suspend');
    });
});
