@extends('black')
@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @if (Cart::count() > 0)
        <div class="px-4 px-lg-0">


            <div class="pb-5 col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Produit</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Prix</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Quantité</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Supprimer</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $produit)
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                        <img src="{{ $produit->model->image }}" alt=""
                                                            width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="#"
                                                                    class="text-dark d-inline-block align-middle">{{ $produit->model->libelle }}</a>
                                                            </h5><span
                                                                class="text-muted font-weight-normal font-italic d-block">Category:
                                                                Watches</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle">
                                                    <strong>{{ $produit->subtotal() }}</strong>
                                                </td>
                                                <!-- mise à jour ppanier-->
                                                <td class="border-0 align-middle"><strong>
                                                        <form action="{{ route('cart.update', $produit->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="col-lg-12">
                                                                <input class="form-control" type="number" name="quantity"
                                                                    min="1" value="{{ $produit->qty }}">
                                                            </div>
                                                        </form>
                                                    </strong></td>
                                                <!-- mise à jour ppanier-->
                                                <td class="border-0 align-middle">
                                                    <form action="{{ route('cart.destroy', $produit->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="text-dark"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm col-md-12    ">
                        <div class="col-lg-6 col-md-12 d-flex  flex-column">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Code promo</div>
                            @if (!request()->session()->has('coupon'))
                                <div class="p-4 col-md-12 d-flex  flex-column">
                                    <p class="font-italic mb-4">Si vous avez un code promo, veuillez l'entrer dans la case
                                        ci-dessous</p>
                                    <div class="input-group mb-4 border rounded-pill p-2">
                                        <form action="{{ route('cart.store.coupon') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-4 border rounded-pill p-2">
                                                <input type="text" placeholder="entrer votre code ici"
                                                    aria-describedby="button-addon3" name="code"
                                                    class="form-control border-0">
                                                <div class="input-group-append border-0">
                                                    <button id="button-addon3" type="submit"
                                                        class="btn btn-dark px-4 rounded-pill"><i
                                                            class="fa fa-gift mr-2"></i>Appliquer Coupon</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                @else
                                    <div class="p-4 col-md-12">
                                        <h1>le coupon est deja appliqué</h1>

                                    </div>
                            @endif
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions
                                pour
                                le vendeur</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Si vous avez des informations pour le vendeur, vous pouvez
                                    les
                                    laisser dans la case ci-dessous</p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 d-flex flex-column">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détail de la
                                    commande </div>
                                <div class="p-4 d-block ">
                                    <p class="font-italic mb-4">Les frais d'expédition et les frais supplémentaires sont
                                        calculés en fonction des valeurs que vous avez saisies.</p>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                class="text-muted">Sous total
                                            </strong><strong>{{ Cart::subtotal() }}</strong>
                                        </li>
                                        @if (request()->session()->has('coupon'))
                                            <li class="d-flex justify-content-between py-3 border-bottom">

                                                <strong class="text-muted">coupon
                                                    {{ request()->session()->get('coupon')['code'] }}
                                                    <form action="{{ route('cart.destroy.coupon') }}" method="post"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </strong>
                                                <strong>

                                                    {{ request()->session()->get('coupon')['remise'] }}
                                                </strong>

                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Nouveau Sous-Total</strong>
                                                <h5 class="font-weight-bold">
                                                    {{-- {{Cart::subtotal() - request()->session()->get('coupon')['code']}} --}}
                                                </h5>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Tax</strong><strong>
                                                    {{-- {{Cart::subtotal() - request()->session()->get('coupon')['code']*(config('cart.tax')/100)}}</strong> --}}
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Total</strong>
                                                {{-- <h5 class="font-weight-bold">{{Cart::subtotal() - request()->session()->get('coupon')['code']+{Cart::subtotal() - request()->session()->get('coupon')['code']*(config('cart.tax')/100)}}</h5> --}}
                                            </li>
                                        @else
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Tax</strong><strong>{{ Cart::tax() }}</strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Total</strong>
                                                <h5 class="font-weight-bold">{{ Cart::total() }}</h5>
                                            </li>
                                        @endif

                                    </ul><a href="{{ route('checkout.index') }}"
                                        class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="col-md-12">
            <p>votre panier est vide</p>
        </div>
    @endif

@endsection
@section('extra-js')
    <script>
        //console.log('teste');
        document.addEventListener('DOMContentLoaded', () => {
            const quantite = document.querySelectorAll('input[name="quantity"]');
            quantite.forEach(input => {
                input.addEventListener('input', e => {
                    if (e.target.value < 1) {
                        e.target.value = 1;
                    } else {
                        e.target.parentNode.parentNode.submit();
                    }
                })
            });
        });
    </script>
@endsection
