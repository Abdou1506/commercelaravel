@extends('Backend/temp')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto shadow p-2">
        <form action="{{route('produits.update',$produits->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="image" class="label-control">Image</label>
                <input type="file" class="form-control" name="image" value="{{old('image',$produits->image)}}">

            </div>
            <div class="mb-3">
                <label for="libelle" class="label-control">libelle</label>
                <input type="text" class="form-control" name="libelle" value="{{old('libelle',$produits->libelle)}}">

            </div>
            <div class="mb-3">
                <label for="slug" class="label-control">slug</label>
                <input type="text" class="form-control" name="slug" value="{{old('slug',$produits->slug)}}">

            </div>
            <div class="mb-3">
                <label for="subtitle" class="label-control">subtitle</label>
                <input type="text" class="form-control" name="subtitle" value="{{old('subtitle',$produits->subtitle)}}">

            </div>
            <div class="mb-3">
                <label for="description" class="label-control">description</label>
                <input type="text" class="form-control" name="description" value="{{old('description',$produits->description)}}">

            </div>
            <div class="mb-3">
                <label for="prix" class="label-control">Prix</label>
                <input type="text" class="form-control" name="prix" value="{{old('prix',$produits->prix)}}">

            </div>
            <div class="mb-3">
                <label for="categorie_id" class="label-control">categorie_id</label>
                <input type="text" class="form-control" name="categorie_id" value="{{old('categorie_id',$produits->categorie_id)}}">

            </div>
            <div class="mb-3 rounded">
                <button class="btn btn-primary col-12">Modifier</button>
            </div>
        </form>
    </div>
</div>
    
@endsection