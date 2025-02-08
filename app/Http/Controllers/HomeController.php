<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
        //  $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminRole = Auth::user()->roles()->pluck('name');
        if ($adminRole->contains('admin')) {
            return redirect()->to('/dashboard')->with('success', 'Admin Logged in Successfully.');
        }
        
        if (Auth::user()->user_type === 'employer' || Auth::user()->user_type === 'Recruiter' || Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'Interviewer' || Auth::user()->user_type === 'Talent Acquisition/HR Manager' || Auth::user()->user_type === 'Employee'){
            return redirect()->to('/jobs/track_application');
    
            
        }elseif(auth::user()->user_type=='seeker') {
            $jobs = Auth::user()->favorites()->paginate(3);
            return redirect()->to('/user/interview');
            // return redirect()->to('/user/profile');
        }


        $jobs = Auth::user()->favorites->paginate(3);
        
        return view('home', compact('jobs'));
    }
   public function save()
{
    if (!auth()->check()) {
        return redirect('login');
    }
    $jobs = Auth::user()->favorites()->paginate(3); // Corrected this line
    return view('home', compact('jobs')); // Corrected 'job' to 'jobs'
}
    
}
