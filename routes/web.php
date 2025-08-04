<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
// use App\Http\Controllers\Controller\admin\CategorieController;

Route::get('/', function () {
    return view('admin.base');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategorieController::class);
    Route::resource('produits', ProduitController::class);
});