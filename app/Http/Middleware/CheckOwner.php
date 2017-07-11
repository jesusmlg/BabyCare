<?php

namespace App\Http\Middleware;

use Closure;
use App\Baby;
use Illuminate\Support\Facades\Auth;
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
    public function handle($request, Closure $next)
    {
        $baby = Baby::find($request->baby->id);

        if($baby->user_id != Auth::id())
            return back()->withInput();

        return $next($request);
    }
}
