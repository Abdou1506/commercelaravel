<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Order;
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
                return redirect()->route('frontend/produits.index');
            }
            Stripe::setApiKey('sk_test_51LyuCVKdngnkBYHhqjzKXo9wlEdiffsuLkD3EUK00pPhIwDo2ktGefxCdYTst79HEIC1laoPzwLk6I0ggMKKCxmi008pp25wVl');
          if (request()->session()->has('coupon')) {
            $total=(Cart::subtotal() - request()->session()->get('coupon')['remise'])+
            (Cart::subtotal() - request()->session()->get('coupon')['remise']*(config('cart.tax')/100));
          } else {
            $total=Cart::total();
          }
          
            $intent= PaymentIntent::create([
                'amount'=>round($total),
                'currency'=>'eur',
                // 'metadata'=>[
                //     'userId'=> Auth::user()->id
    
                // ]
            ]);
        //dd($intent);
        $clientSecret= Arr::get($intent, 'client_secret');
    
            return view('frontend/checkout.index',[
                'clientSecret'=>$clientSecret,
                'total'=>$total
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
        
        $data = $request->json()->all();
        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];
        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');
        $produits = [];
        $i = 0; 
        foreach (Cart::content() as $produit) {
            $produits['produit_' . $i][] = $produit->model->libelle;
            $produits['produit_' . $i][] = $produit->model->prix;
            $produits['produit_' . $i][] = $produit->qty;
            $i++;
        }

        $order->produits = serialize($produits);
        $order->user_id = Auth()->user()->id;
        $order->save();

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
        return Session::has('success') ? view('frontend/checkout.thankyou') : redirect()->route('checkout.thankyou');
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
