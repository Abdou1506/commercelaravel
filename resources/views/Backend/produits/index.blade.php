@extends('Backend.temp')
@section('content')
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
  
      <a href="{{route('produits.create')}}" class="btn btn-primary"> Ajouter produit</a>
      <div class="table_section padding_infor_info">
        <div class="table-responsive-sm">
          <table class="table table-striped" id="produits">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">Libelle </th>
                <th scope="col">Slug </th>
                <th scope="col">subtitle</th>
                <th scope="col">description</th>
               
                <th scope="col">Prix </th>
                {{-- <th scope="col">Categorie </th> --}}
               
                <th scope="col">Action</th>
  
  
              </tr>
            </thead>
            <tbody>
              @foreach ($produits as $p)
  
              <tr>
                <th scope="row">{{$p->id}}</th>
                <td>
                  <img src="{{asset('images/'. $p->image)}}" width="100px" height="100px">
                </td>
                <td>{{$p->libelle}}</td>
                <td>{{$p->slug}}</td>
                <td>{{$p->subtitle}}</td>
                <td>{{$p->description}}</td>
               
                <td>{{$p->prix}}</td>
                {{-- <td>{{$p->categorie->nom}}</td> --}}
                
                <td class="btn-group">
                  <form method="post" action="{{route('produits.destroy',$p->id)}}" onclick="return confirm('supprimer?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
  
                  </form>
                  <a class="btn btn-warning" href="{{route('produits.edit',$p)}}"><i class="fa-solid fa-pen-to-square"></i></a>
  
                </td>
  
  
  
              </tr>
              @endforeach
  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
@endsection