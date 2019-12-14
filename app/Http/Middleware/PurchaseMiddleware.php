<?php

namespace App\Http\Middleware;

use Closure;

class PurchaseMiddleware
{
    private $redirectTo = "produits";
    /**
     * Handle an incoming request.
     * redirect the request to products page if chart is empty
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->get("chart.totalPrice",0) === 0){
            redirect(route($this->redirectTo));
        }
        return $next($request);
    }
}
