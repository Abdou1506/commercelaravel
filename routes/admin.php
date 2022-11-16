<?php 
use App\Http\Controllers\backend\CategorieController;
use App\Http\Controllers\backend\ProduitController;
use Illuminate\Support\Facades\Route;
Route::get('/temp',[ProduitController::class,'index']);
Route::resource('produits', ProduitController::class);
Route::resource('categories', CategorieController::class);











