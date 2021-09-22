<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
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
        $locale = null;
        if(Auth::check() && !Session::has('locale')){
            $locale = $request->user()->locale;
            Session::put('locale', $locale);
        }
        if($request->has('locale')){
            // dd($request->get('locale'));
            $locale = $request->get('locale');
            Session::put('locale', $locale);
        }

        if(null === $locale){
            $locale = config('app.fallback_locale');
        }

        App::setlocale($locale);
        // dd(Session::get('locale'));
        return $next($request);
    }
}
