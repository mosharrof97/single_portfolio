<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (! Auth::guard('user')->check()) {
        //     return redirect()->route('login')
        //     ->with('error', 'You need to log in to access this page.')
        //     ->with('url.intended', $request->fullUrl());
        // }

        if (!Auth::guard('user')->check()) {
            session()->put('url.intended', $request->fullUrl());

            return redirect()->route('login')
                ->with('error', 'You need to log in to access this page.');
        }
        return $next($request);
    }
}


// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         if (! Auth::guard('client')->check()) {
//             return redirect()->route('client.login')
//             ->with('error', 'You need to log in to access this page.')
//             ->with('url.intended', $request->fullUrl());
//         }

//         return $next($request);
//     }
// }