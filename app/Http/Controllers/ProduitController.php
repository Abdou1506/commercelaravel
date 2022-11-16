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
    })->orderBy('created_at', 'DESC')->paginate(6);
} else {
    $produits = Produit::with('categories')->orderBy('created_at', 'DESC')->paginate(6);
}
    $categorie=Categorie::all();
    return view ('produits.index',compact('produits','categorie'));
 }


 public function show($slug)
 {
   

    $produit=Produit::where('slug', $slug)->First();
    return view('produits.show',compact('produit')) ;

 }
 public function search()
 {
 $q=request()->input('q');
 dd($q);
 }
}
