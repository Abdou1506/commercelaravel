<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Produit;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/cart.index');
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
    public function store(Request $request,)
    {
        //  dd($request->id,$request->libelle,$request->prix);                    
        
         $duplicata=Cart::search(function ($cartItem, $rowId) use ($request) {
             return $cartItem->id ===$request->produit_id;
         });
        if ($duplicata->isNotEmpty()) {
            return redirect()->route('frontend/produits.index')->with('success','produit a déja été ajouté ');
         }
        $produit=Produit::find($request->produit_id);
        Cart::add($produit->id,$produit->libelle,1,$produit->prix)->associate('App\Models\Produit');
        return redirect()->route('frontend/produits.index')->with('success','produit a bien été ajouté avec  succé');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
    public function update(Request $request, $rowId)
    {
//         $data=$request->json()->all();
//         $validate=Validator::make($request->all(),[
// 'qty'=>'required|numeric|beetween:1,6'
//         ]);
        // if ($validate->fails()) {
        //     // Session::Flash('danger','la quantité du produit ne doit pas  dépassée 6');
        //     session()->flash('danger','la quantité du produit ne doit pas  dépassée 6');

        // return response()->json(['error'=>"cart  n'a été MAJ"]);
        // }
    $produit=Produit::all();

        Cart::update($rowId, $request->quantity,$request->qty,$request->stock);
        return back()->with('success','Le panier est mise a jour ');
        if ($request->qty>$request->stock) {
            return back()->with('error', 'la quantité demandée n\'est pas dispo',compact('produit'));
           }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
      Cart::remove($rowId);
      return back()->with('success','produits a été supprimé');
    }
    public function storeCoupon(Request $request)
    {
        $code=$request->get('code');
        $coupon=Coupon::where('code',$code)->first();
        if (!$coupon) {
            return redirect()->back()->with('error', 'le coupon est invalide');
        }
        $request->session()->put('coupon',[
            'code'=>$coupon->code,
            'remise'=>$coupon->discount(Cart::subtotal())
            
        ]);
        return redirect()->back()->with('success', 'le coupon est appliqué');

        
    }
    public function destroyCoupon()
    {
       request()->session()->forget('coupon');
       return redirect()->back()->with('success','le coupon a ete retiré');
    }
}
