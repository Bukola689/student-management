<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user_type == 'teacher') {
            return redirect ('you dont have access to view this pages');
        }
        return $next($request);
    }
}
