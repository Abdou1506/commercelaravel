
@extends('black')
@section('liste-commande')
   <h1 class="text-center ">liste des commandes</h1>
@endsection
@section('content')

@foreach (Auth()->user()->commandes as $commande)
    <div class="card">
        <div class="card-header">
            Commande passé le {{Carbon\Carbon::parse($commande->payment_created_at)->format('d/m/Y à H:m:s')}} d'un montant de <strong>{{$commande->amount}}</strong>
        </div>
        <div class="card-body">
            <h1 class="text-center">liste des produits</h1>
           @foreach (unserialize($commandes->$produits) as $produit)
           <div>Nom du produit:{{$produit[0]}}</div>
           <div>Prix:{{$produit[1]}}</div>
           <div>Quantité:{{$produit[2]}}</div>
           
               
           @endforeach
        </div>
    </div>
@endforeach
    
@endsection