<?php

namespace App\Http\Middleware;

use Closure;
use App\Baby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Illuminate\Http\Request;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
               
        if($request->isMethod('post'))
            $baby_id = $request->baby_id;
        else
            $baby_id = $request->baby->id;

        
        $baby = Baby::find($baby_id);

        if($baby->user_id != Auth::id())
            return back()->withInput();
        else

        return $next($request);
    }
}
