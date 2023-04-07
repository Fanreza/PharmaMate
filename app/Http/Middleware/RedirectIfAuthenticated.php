<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->roles()->first()->name; 

            switch ($role) {
            case 'Gudang':
                return redirect('/purchases');
                break;

            case 'Kasir':
            return '/sales';
            break; 

            case 'Pemilik':
            return '/medicines';
            break; 

            default:
                return redirect('/users'); 
                break;
            }
        }
        return $next($request);
    }
}
