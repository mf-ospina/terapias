<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        // Verificar si el usuario esta autenticado y compara el usuario autenticado con el epecificado en la ruta
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Si no tiene el rol, redirigir o mostrar un error
        return abort(403, 'No tiene acceso a esta página');
        //return redirect('/home')->with('error', 'No tienes acceso a esta página');
    }
}
