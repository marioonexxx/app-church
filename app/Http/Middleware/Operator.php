<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        //ROLE ADMINISTRATOR
        if($userRole == 1)
        {
            return redirect()->route('dashboard');
        }
        //ROLE OPERATOR
        if($userRole == 2)
        {
           return $next($request);
        }
        //ROLE EDITOR
        if($userRole == 3)
        {
            return redirect()->route('editor.dashboard');
        }
    }
}
