<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleLevel
{
    // titik tiga dibawah ini maksudnya array
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // kasih logika kalau user itu ada role yang sesuai
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        
        // ini kondisi dimana user tidak boleh melalui jalur itu
        return abort(403);
    }
}
