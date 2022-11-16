{{-- @extends('black')
@section('login') --}}


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('pagelogin/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('pagelogin/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('pagelogin/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('pagelogin/css/style.css') }}">

    <title>Bienvenue à Winbest</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4 text-center">
                                    <h3>Connectez-vous à <strong>Winbest</strong></h3>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group first">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex mb-5 align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                me</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                        <span class="ml-auto">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Mot de passe oublié?') }}
                                                </a>
                                            @endif
                                        </span>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-pill text-white btn-block btn-primary">{{ __(' Connexion') }}
                                    </button>

                                    <span class="d-block text-center my-4 text-muted"> ou connectez-vous avec</span>

                                    <div class="social-login text-center">
                                        <a href="#" class="facebook">
                                            <span class="icon-facebook mr-3"></span>
                                        </a>
                                        <a href="#" class="twitter">
                                            <span class="icon-twitter mr-3"></span>
                                        </a>
                                        <a href="#" class="google">
                                            <span class="icon-google mr-3"></span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('pagelogin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('pagelogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('pagelogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('pagelogin/js/main.js') }}"></script>
</body>

</html>
{{-- @endsection --}}




