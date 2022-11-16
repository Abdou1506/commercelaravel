<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action={{route('produits.search')}}>
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                            {{-- @include('partial.search') --}}
                        </button type="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
                
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Déconnexion') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></span>
              </a>
            <a href="{{route('cart.index')}}" class="btn border ">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge badge-pill badge bg-primary">{{Cart::count()}}</span>
            </a>           
            {{-- @include('partial.auth') --}}


        </div>
    </div>
</div>