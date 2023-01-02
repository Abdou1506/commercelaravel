<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
// if(Auth::check()){
//     if(Auth::user()->role=='admin'){
//         return $next($request);
//     }
//     else{
//         return redirect('/produits.index')->with("status" ,"vous n'etes pas l'admin");
//     }
// }
// else{
//     return redirect('/produits.index')->with("status" ,"il faut se connecter d'abord");
// }
// }
