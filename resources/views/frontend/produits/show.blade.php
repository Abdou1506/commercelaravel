@extends('black')
@section('content')
<div class="badge badge-pill badge-info col-md-3 ">{{$stock}}</div>
    <div class="col-md-12">

        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">produit</strong>
                <h6 class="mb-0">{{ $produit->libelle }}</h6>
                 <div class="mb-1 text-muted">{{$produit->created_at->format('d/m/y')}}</div>
                <p class="card-text mb-auto">{!! $produit->description !!}</p>
                <strong class="card-text mb-auto">{{ $produit->prix }}</strong>

            </div>
            <div class="col-auto d-none d-lg-block">
                
                {{-- <img src="{{ $produit->image }}"> --}}
                 <img src="{{ asset('images/' . $produit->image) }}"> 
                {{-- @if ($produit->images) 
                     @foreach (json_decode($produit->images, true) as $image)
     <img src="{{asset('storage/'.$image)}}" width="50">
     @endforeach
                @endif --}} 
            </div>
@if ($stock==='disponible')
      <form action="{{ route('cart.store') }}" method="post" class="mt-3">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">

                <button type="submit" class="btn btn-dark">Ajouter au panier</button>
            </form>
@endif

          
            <div class="col-auto d-none d-lg-block d-flex justify-content-around mt-5 mb-5">
                <button class="btn btn-Light"><i class="fa-brands fa-whatsapp cercle"></i> </button>
                <button class="btn btn-Light"><i class="fa-solid fa-phone"></i></button>
                <button class="btn btn-primary"><i class="fa-solid fa-comment"></i>CONTACTER LE VENDEUR</button>
            </div>
        </div>
    </div>


    </div>
@endsection
