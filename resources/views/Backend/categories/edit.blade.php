@extends('Backend/temp')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto shadow p-2">
        <form action="{{route('categories.update',$categories->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="label-control">nom categorie</label>
                <input type="text" class="form-control" name="nomcategorie" value="{{old('nomc',$categories->nom)}}">

            </div>
            <div class="mb-3">
                <label for="slug" class="label-control">slug</label>
                <input type="text" class="form-control" name="slug" value="{{old('slug',$categories->slug)}}">

            </div>
            <div class="mb-3 rounded">
                <button class="btn btn-primary col-12">Modifier</button>
            </div>
        </form>
    </div>
</div>
    
@endsection