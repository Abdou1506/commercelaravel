<?php

namespace App\Listeners;

use App\Models\Coupon;

use Gloudemans\Shoppingcart\Facades\Cart;


class CartUpdatingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $code=request()->session->get('coupon');
        // $coupon=Coupon::where('code',$code)->first();
        // if ($coupon) {
        //     request()->session()->put('coupon',[
        //         'code'=>$coupon->code,
        //         'remise'=>$coupon->discount(Cart::subtotal())
                
        //     ]); 
        // }
        // }
       
      
}
}