<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (Cart::count()<= 0) {
                return redirect()->route('produits.index');
            }
            Stripe::setApiKey('sk_test_51LyuCVKdngnkBYHhqjzKXo9wlEdiffsuLkD3EUK00pPhIwDo2ktGefxCdYTst79HEIC1laoPzwLk6I0ggMKKCxmi008pp25wVl');
        //   if (request()->session()->has('coupon')) {
        //     $total=Cart::subtotal() - request()->session()->get('coupon')['code']+(Cart::subtotal() - request()->session()->get('coupon')['code']*(config('cart.tax')/100));
        //   } else {
        //     $total=Cart::total();
        //   }
          
            $intent= PaymentIntent::create([
                'amount'=>round(Cart::total()),
                'currency'=>'eur',
                // 'metadata'=>[
                //     'userId'=> Auth::user()->id
    
                // ]
            ]);
        //dd($intent);
        $clientSecret= Arr::get($intent, 'client_secret');
    
            return view('checkout.index',[
                'clientSecret'=>$clientSecret
            ]);
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $commande=Commande::create([
        //     'user_id'=>auth()->user()? auth()->user()->id:null,
        //     'payment_intent_id'=>$request->payment_intent_id,
        //     'amount'=>$request->amount,
        //     'payment'=>$request->payment,
             
        //   'payment_created_at'=>$request->payment_created_at,

        //     'produits'=>$request->produits

        // ])
        $data = $request->json()->all();

        $commande = new Commande();

        $commande->payment_intent_id = $data['paymentIntent']['id'];
        $commande->amount = $data['paymentIntent']['amount'];

        $commande->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $produits = [];
        $i = 0;

        foreach (Cart::content() as $produit) {
            $produits['product_' . $i][] = $produit->model->libelle;
            $produits['product_' . $i][] = $produit->model->prix;
            $produits['product_' . $i][] = $produit->qty;
            $i++;
        }

        $commande->produits = serialize($produits);
        $commande->user_id = Auth()->user()->id;
        $commande->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => "merci  votre commande  a bien été prise en compte "]);
        } else {
            return response()->json(['error' => "désolé  votre commande  n'a été pas prise en compte  "]);
        }
    }

    public function thankyou()
    {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('produits.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  
}
