<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckUserRole
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
        // return $next($request);

        if(Auth::check())
        {
            $adminRole = Auth::user()->roles()->pluck('name');
            if ($adminRole->contains('admin')) {
                return redirect()->to('/dashboard')->with('success', 'Admin Logged in Successfully.');
            }
    
            if (auth::user()->user_type=='Recruiter') {
                return redirect()->to('/recruiter/profile');
            
                
            }elseif (auth::user()->user_type=='Hiring Manager') {
                return redirect()->to('/hiring_manager/profile');
            
                
            }elseif (auth::user()->user_type=='Interviewer') {
                return redirect()->to('/interviewer/profile'); 
            
                
            }elseif (auth::user()->user_type=='Talent Acquisition/HR Manager') {
                return redirect()->to('/hr_manager/profile');
            
                
            }elseif (auth::user()->user_type=='Employee') {
                return redirect()->to('/employee/profile');
            
                
            }elseif(auth::user()->user_type=='employer') {
                return redirect()->to('/company/create');
            
                
            }elseif(auth::user()->user_type=='seeker') {
                 $jobs = Auth::user()->favorites()->paginate(3);
            
            return view('home', compact('jobs'));
                // return redirect()->to('/user/profile');
            }   
        }


        return $next($request);
    }
}
