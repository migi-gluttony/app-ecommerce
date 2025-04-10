<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

// Route principale qui affiche tous les produits
Route::get('/', [CartController::class, 'index']);

// Routes pour le panier
Route::get('/cart', [CartController::class, 'viewCart']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart']);
Route::get('/clear-cart', [CartController::class, 'clearCart']);

// Routes pour la gestion des produits (si nécessaire)
Route::resource('products', ProductController::class);