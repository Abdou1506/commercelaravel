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
            
  
              <tr>
                <th scope="row">{{$produit->id}}</th>
                <td>
                  <img src="{{asset('images/'. $produit->image)}}" width="100px" height="100px">
                </td>
                <td>{{$produit->libelle}}</td>
                <td>{{$produit->slug}}</td>
                <td>{{$produit->subtitle}}</td>
                <td>{{$produit->description}}</td>
               
                <td>{{$produit->prix}}</td>
                {{-- <td>{{$p->categorie->nom}}</td> --}}
                
                <td class="btn-group  mt-4">
                  <form method="post" action="{{route('produits.destroy',$produit->id)}}" onclick="return confirm('supprimer?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
  
                  </form>
                  <a class="btn btn-warning" href="{{route('produits.edit',$produit)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                  {{-- <a class="btn btn-primary" href="{{route('produits.show',$produit)}}"><i class="fa-solid fa-eye"></i></a> --}}
  
                </td>
  
  
  
              </tr>
            
  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
@endsection