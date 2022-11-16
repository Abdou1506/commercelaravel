<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stripe\ApiOperations\Search;
use TCG\Voyager\Facades\Voyager;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/temp', function () {
//     return view('temp');
// });
Route::get('/black', function () {
    return view('black');
});
Route::get('/contact', function () {
    return view('contact.contact');
});
// la route des produits
Route::get('/boutique', [ProduitController::class, 'index'])->name('produits.index');
 Route::get('/boutique/{slug}', [ProduitController::class, 'show'])->name('produits.show'); 
 route::get('/seaarch',[ProduitController::class, 'search'])->name('produits.search');
// Route::resource('Produits', ProduitController::class);

// carte route
Route::group([''=>['']], function ()
{
    Route::get('/panier', [CartController::class, 'index'])->name('cart.index'); 
    Route::post('/panier/ajouter', [CartController::class, 'store'])->name('cart.store'); 
    Route::delete('/panier/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy'); 
    route::put('/panier/{rowId}', [CartController::class, 'update'])->name('cart.update'); 
    Route::post('/coupon', [CartController::class, 'storeCoupon'])->name('cart.store.coupon');
    Route::delete('/coupon', [CartController::class, 'destroyCoupon'])->name('cart.destroy.coupon');



});
// Route::middleware(['auth','role:admin'])->group(function () {
//     Route::get('/private', function () {
//            return 'bonj admin';
// });
// Route::middleware(['auth','role:admin'])->groupe( function ()
// {
//     Route::get('/private', function () {
//         return 'bonj admin';
//     });

// });
// Route::get('/private', function () {
//     return 'bonjour admin';
// })->middleware(['auth','role:admin']);
Route::get('/private', function () {
    $user=\App\Models\User::first();
    // dd($user->roles);
    return 'bonjour admin';
});

//paiement
Route::group(['middleware'=>['auth']], function ()
{
    Route::get('/paiement', [CheckoutController::class, 'index'])->name('checkout.index'); 
    Route::post('/paiement', [CheckoutController::class, 'store'])->name('checkout.store'); 
    Route::get('/merci', [CheckoutController::class, 'thankyou'])->name('checkout.thankyou'); 
});
Route::get('commande', [CommandeController::class , 'index'])->name('commandes.index');







Route::get('/', [App\Http\Controllers\ProduitController::class, 'index'])->name('index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProduitController::class, 'index'])->name('index');


