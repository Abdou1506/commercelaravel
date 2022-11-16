@extends('black')
@section('caroussel')
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 410px;">
                <img class="img-fluid" src="public/storage/produits/8t0SRPRI9fLlJeSUS5M7.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                        </h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 410px;">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                        </h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($produits as $produit)
            <div class="col">
                <div class="card shadow-sm">
                    {{-- <img src="{{ $produit->image }}" height="200"> --}}
                    <img src="{{ asset('images/' . $produit->image) }}" height="200" width="250" class="m-auto">
                    <h6 class="mb-0 text-muted">{{ $produit->categories->nom }}</h6>

                    <div class="card-body">
                        <h6 class="mb-0 text-success fs-3 fw-2">{{ $produit->libelle }}</h6>
                        <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/y') }}</div>
                        <p class="card-text">{{ $produit->subtitle }}</p>
                        <strong class="card-text mb-auto mx-auto text-success fs-3 fw-1">{{ $produit->prix }}</strong>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a
                                        href="{{ route('produits.show', $produit->slug) }}"
                                        class="stretched-link btn btn-info">voir
                                        l'article</a></button>

                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        @endforeach
    </div>
    {{-- {{$produits->append($request()->input()->Appended Text);->links()}} --}}
@endsection
