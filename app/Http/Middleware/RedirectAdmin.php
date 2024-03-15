<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdmin
{
    public function handle(Request $request, Closure $next): Response
    {   
            if (!auth()->check()) {
                return redirect()->route('login');
            }

            $user = auth()->user();

            if ($user->hasRole('admin') && $user->is_active == true ) {
            return $next($request);
            }

            if ($user->hasRole('user') && $user->is_active == true) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Vous n\'avez pas les droits d\'accès à cette page.');
            }

        // Si l'utilisateur n'a pas les rôles appropriés, redirigez-le ailleurs.
            return redirect('/');
    }
}
