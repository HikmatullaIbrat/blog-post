<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

use Session;
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
            
            // Check if the session has a 'locale' key
            // if (Session::has('locale')) {
            //     // Set the application locale to the session locale
            //     App::setLocale(Session::get('locale'));
            // }
            
            // $locale = Session::get('locale', config('app.locale'));
        //   App::setLocale($locale);
        // if(Session::has('locale')) {
        //     $locale = Session::get('locale', Config::set('app.locale'));
        // } else {
        //     $locale = "bg";
        // }
    
        // App::setLocale($locale);

        // Check if the session has a 'locale' key
        if($request->session()->get('locale')){
            
            // Set the application locale to the session locale
            \App::setLocale($request->session()->get('locale'));
        }
            // dd('This is for testing');
            // echo "hello";
            return $next($request);
            
            
    }
}
