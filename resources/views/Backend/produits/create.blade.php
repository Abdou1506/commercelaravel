@extends('Backend.temp')
@section('content')
<div class="col-md-6 m-3 mx-auto shadow p-2">
    <form action="{{route('produits.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="label-control">image</label>
            <input type="file" class="form-control" name="image" >

        </div>
        <div class="mb-3">
            <label for="libelle" class="label-control">Libelle</label>
            <input type="text" class="form-control" name="libelle">

        </div>
        <div class="mb-3">
            <label for="slug" class="label-control">slug</label>
            <input type="text" class="form-control" name="slug">

        </div>
        <div class="mb-3">
            <label for="subtitle" class="label-control">subtitle</label>
            <input type="text" class="form-control" name="subtitle">

        </div>
        <div class="mb-3">
            <label for="description" class="label-control">description</label>
            <input type="text" class="form-control" name="description">

        </div>
        <div class="mb-3">
            <label for="prix" class="label-control">prix</label>
            <input type="text" class="form-control" name="prix">

        </div>
        {{-- <div class="mb-3">
            <label for="qte" class="label-control">Qte</label>
            <input type="text" class="form-control" name="qte">

        </div> --}}
        {{-- <div class="mb-3">
            <label for="prix_unitaire" class="label-control">Prix</label>
            <input type="text" class="form-control" name="prix_unitaire">

        </div> --}}
        <div class="mb-3">
            <label for="libelle" class="label-control">Nom Categorie</label>
            <select name="categorie_id" class="form-select" id="">
                <option value=""selected>............</option>

                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" >{{ $c->nom }}</option>
                @endforeach

            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="nomclasse" class="label-control">Nom Fournisseur</label>
            <select name="fournisseur_id" class="form-select" id="">
                @foreach ($fournisseurs as $f)
                    <option value="{{ $f->id }}">{{ $f->nom }}</option>
                @endforeach

            </select>
        </div> --}}
        <div class="mb-3 rounded">
            <button class="btn btn-primary col-12">Ajouter</button>
        </div>
    </form>
</div>
@endsection