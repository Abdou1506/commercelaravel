@extends('black')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection
@section('extra_script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
    <div class="col-md-12 d-flex flex-column justify-content-center my-5 ml-5">
        <h1>page de payment</h1>
        <div class="row">
            <div class="col-md-6 mt-4">
                <form action="{{route('checkout.store')}}" method="POST" id="payment-form" >
                    @csrf
                    <div id="card-element" >
                        <!--Stripe.js injects the Payment Element-->
                    </div>
                    <div id="cart-errors" role="alert">
                        <!--Stripe.js injects the Payment Element-->
                    </div>
                    <button class="btn btn-success mt-3" id="submit">Procéder au paiement {{ Cart::total() }} FCFA</button>
                </form>

            </div>
        </div>

    </div>
@endsection

@section('extra-js')


<script>
    //suppression de la barre de navigation-->
// document.getElementsByClassName('blog-header')[0].classList.add("d-none");
// document.getElementsByClassName('nav-scroller')[0].classList.add("d-none");
    //<!-- suppression de la barre de navigation-->
    var stripe = Stripe('pk_test_51LyuCVKdngnkBYHhE7vNzZ22dSqYhqiOjA7gwYediDw8SpHElUgkAFnto9S93xcBxTNnBkAlmmqwltOKjRoRpqxx00AxmEsuPL');
    var elements = stripe.elements();
    var style = {
        base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4"
        }
        },
        invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
        }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');
    submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    submitButton.disabled=true;
    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
            card: card
        }
        }).then(function(result) {
            if (result.error) {
            // Show error to your customer (e.g., insufficient funds)
            submitButton.disabled=false;
            console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent=result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var form=document.getElementById('payment-form');
                    var url = form.action;
                    var redirect= '/merci';
                    fetch(
                        url,
                        {        
                            headers:{
                                 "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method:'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent
                            })
                        }
                    ).then((data) => {
                            console.log(data);
                            form.reset();
                           window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
                   console.log(result.paymentIntent);
                }
            }
        });
    });
</script>
@endsection
