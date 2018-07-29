<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;
use Auth;

class CheckUserProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() ) 
        {
            $id = Auth::user()->id;
            $countData = Product::where('user_id',$id)->where('status',1)->where('viewstatus',1)->get()->count(); 

            if($countData < 2)
                return redirect('/dashboard');
        }

        return $next($request);
    }
}
