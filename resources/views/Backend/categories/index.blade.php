@extends('Backend/temp')
@section('content')
<div class="table_section padding_infor_info">
    <a href="{{route('categories.create')}}" class="btn btn-primary"> Ajouter categorie</a>
        <div class="table-responsive-sm">
            <table class="table table-striped" id="categories">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Categorie</th>
                        <th scope="col">slug</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                        <tr>
                            <th scope="row">{{ $c->id }}</th>
                            <td>{{ $c->nom }}</td>
                            <td>{{ $c->slug }}</td>
                            <td class="btn-group">
                                <form method="post" action="{{ route('categories.destroy', $c->id) }}"
                                    onclick="return confirm('supprimer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>

                                </form>
                                <a class="btn btn-warning" href="{{ route('categories.edit', $c->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                            </td>


                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
@endsection