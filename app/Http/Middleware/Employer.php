<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->user_type === 'employer' || Auth::user()->user_type == 'Recruiter' || Auth::user()->user_type == 'Hiring Manager'  || Auth::user()->user_type == 'Interviewer' || Auth::user()->user_type == 'Talent Acquisition/HR Manager' || Auth::user()->user_type == 'Employee' ) {
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
