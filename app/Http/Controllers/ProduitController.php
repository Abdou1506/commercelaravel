<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;


class ProduitController extends Controller
{
 public function index()
 {
   if (request()->categorie) {
    

    $produits=Produit::with('categories')->whereHas('categories'.function ( $query )
    {
      $query->where('slug', request()->categorie);
    })->orderBy('created_at', 'DESC')->paginate(8);
} else {
    $produits = Produit::with('categories')->orderBy('created_at', 'DESC')->paginate(8);
}
    $categorie=Categorie::all();
    return view ('frontend/produits.index',compact('produits','categorie'));
 }


 public function show($slug)
 {
   

    $produit=Produit::where('slug', $slug)->First();
    $stock=$produit->stock===0 ? 'indisponible': 'disponible';
    return view('frontend/produits.show',compact('produit','stock')) ;

 }
 public function search()
 {
 $q=request()->input('q');
 dd($q);
 }
}
