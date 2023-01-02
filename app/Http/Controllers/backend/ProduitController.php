<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits=Produit::all();
    // dd($produits);
        return view('Backend/produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $categories=Categorie::all();
        return view('Backend/produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit=new Produit;
        $produit->libelle = $request->libelle;
        $produit->slug = $request->slug;
        $produit->subtitle = $request->subtitle;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        // $produit->qte = $request->qte;
       
        $produit->categorie_id = $request->categorie_id;
        // $produit->fournisseur_id = $request->fournisseur_id;
        $file = $request->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('images/',$filename);   
        $produit->image=$filename;
        $produit->save();
        return redirect()->route('Backend/produits.index')->with('notice','ajout produit effectué avec succé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit=Produit::where('id', $id)->First();
        $stock=$produit->stock===0 ? 'indisponible': 'disponible';
    return view('Backend/produits.show', compact('produit','stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produits=Produit::find($id);
        return view('Backend/produits/edit', compact('produits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produits=Produit::find($id);
        $produits->update($request->all());
        return redirect()->route('Backend/produits.index')->with('notice','la maj produits effectué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produits=Produit::find($id);
        $produits->delete();
        return redirect()->route('Backend/produits.index')->with('notice','la suppression produit effectuée avec succés'); }
}
