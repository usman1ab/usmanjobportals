<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Interview;
use App\Models\Selection;
use App\Models\FeedBack;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Mail;
use DB;


class UserProfileController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['seeker', 'verified']);
        // $this->middleware(['seeker']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $user = auth()->user(); // Store user temporarily

         Artisan::call('cache:clear');
         Artisan::call('config:clear');
         Artisan::call('route:clear');

       auth()->login($user); // Reauthenticate the user after clearing caches
      $jobs = $user->jobs()->latest()->take(5)->get(); // Fetch latest applied jobs

    return view('frontend.profile.index', compact('user', 'jobs'));
    }
    
    
    public function staff_profile()
    {
    $user = auth()->user(); // Store user temporarily

         Artisan::call('cache:clear');
         Artisan::call('config:clear');
         Artisan::call('route:clear');

       auth()->login($user); // Reauthenticate the user after clearing caches
    //   $jobs = $user->jobs()->latest()->take(5)->get(); // Fetch latest applied jobs

    return view('frontend.profile.staff_profile', compact('user'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          if (!auth()->check()) {
        return redirect('login');
    }
        $user_id = auth()->user()->id;

        if(auth()->user()->user_type != 'seeker')
        {
            User::where('id',$user_id)->update([
                'name' => request('name'),
                'email' => request('email'),
            ]);
            Profile::where('user_id', $user_id)->update([
                'address'=> request('address'),
                'phone'=> request('phone'),
                'dob' => request('dob'),
                'experience'=> request('experience'),
                'bio'=> request('bio'),
              'gender'=> request('gender')
            ]);
        }

        if(auth()->user()->user_type === 'seeker')
        {
            Profile::where('user_id', $user_id)->update([
                'address'=> request('address'),
                'phone'=> request('phone'),
                'skills'=> request('skills'),
                'dob' => request('dob'),
                  'education' => request('education'),
                    'diploma' => request('diploma'),
                      'certification' => request('certification'),
                'specialization'=> request('specialization'),
                'experience'=> request('experience'),
                'bio'=> request('bio'),
                'country'=> request('country'),
                'city' => request('city'),
              'gender'=> request('gender')
            ]);
        }

        return redirect()->back()->with('success', 'Profile Info Successfully Updated.');
    }

    public function coverletter(Request $request){
        $user_id = auth()->user()->id;

        $request->validate([
            'cover_letter'=>'required|mimes:pdf|max:1024',
        ]);

        try{

            if ($request->hasFile('cover_letter')) {
                $file = $request->file('cover_letter');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                // Retrieve the old cover_letter filename
                $old_cover_letter = Profile::where('user_id', $user_id)->value('cover_letter');


                // Delete the old avatar file
                if(is_file(public_path('uploads/files/' . $old_cover_letter))){
                    unlink(public_path('uploads/files/' . $old_cover_letter));

                }

                $file->move('uploads/files/', $filename);

                Profile::where('user_id', $user_id)->update([
                    'cover_letter' => 'uploads/files/' . $filename
                ]);

                return redirect()->back()->with('success', 'Cover Letter Successfully updated.');
            }

            // Retrieve the old Cv filename
            // $oldCv = Profile::where('user_id', $user_id)->value('cover_letter');

            // Delete the old Cv file
            // if ($oldCv) {
            //     Storage::delete($oldCv);
            // }

            // $cover = $request->file('cover_letter')->store('public/files');
            // Profile::where('user_id', $user_id)->update([
            //     'cover_letter'=>$cover
            // ]);

            // return redirect()->back()->with('success', 'Cover Letter Successfully Updated.');
        }catch(\Exception $e){
            return redirect()->back()->with('errors','Something goes wrong while uploading file!');
        }



    }
    public function resume(Request $request){
        $user_id = auth()->user()->id;

        $request->validate([
            'resume'=>'required|mimes:pdf|max:1024',
        ]);

        try{

            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                // Retrieve the old resume filename
                $oldresume = Profile::where('user_id', $user_id)->value('resume');


                // Delete the old avatar file
                if(is_file(public_path('uploads/files/' . $oldresume))){
                    unlink(public_path('uploads/files/' . $oldresume));

                }

                $file->move('uploads/files/', $filename);

                Profile::where('user_id', $user_id)->update([
                    'resume' => 'uploads/files/' . $filename
                ]);

                return redirect()->back()->with('success', 'Resume Successfully updated.');
            }

            // // Retrieve the old resume filename
            // $oldResume = Profile::where('user_id', $user_id)->value('resume');

            // // Delete the old resume file
            // if ($oldResume) {
            //     Storage::delete($oldResume);
            // }


            // $resume = $request->file('resume')->store('public/files');
            // Profile::where('user_id', $user_id)->update([
            //     'resume'=>$resume
            // ]);

            // return redirect()->back()->with('success', 'Resume Successfully Updated.');
        }catch(\Exception $e){
            return redirect()->back()->with('errors','Something goes wrong while uploading file!');
        }




    }

    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'avatar' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            // Retrieve the old avatar filename
            $oldAvatar = Profile::where('user_id', $user_id)->value('avatar');


            // Delete the old avatar file
            if(is_file(public_path('uploads/avatar/' . $oldAvatar))){
                unlink(public_path('uploads/avatar/' . $oldAvatar));

            }

            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);

            return redirect()->back()->with('success', 'Avatar updated...');
        }
    }
    
    public function my_applications(){
        $applications = DB::table('job_user')->where('user_id', auth()->user()->id)->get();
        
        foreach ($applications as $application){
            $application->job = Job::where('id', $application->job_id)->first();
            $interview = Interview::where('user_id', $application->user_id)->where('job_id', $application->job_id)->first();
            if(empty($interview))
            {
                $application->interview = "";
            }else{
                $application->interview = $interview;
                $selection = Selection::where('interview_id', $application->interview->id)->first();
                if(empty($selection))
                {
                    $application->selection = "";
                }else{
                    $application->selection = $selection;
                }
            }
        }
        
        // dd($applications);
        
        return view('frontend.jobs.my_applications', compact('applications'));
    }
    
    public function interview(){
        $applications = DB::table('job_user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(3);
        
        foreach ($applications as $application){
            $application->job = Job::where('id', $application->job_id)->first();
            $interview = Interview::where('user_id', $application->user_id)->where('job_id', $application->job_id)->first();
            if(empty($interview))
            {
                $application->interview = "";
            }else{
                $application->interview = $interview;
                $selection = Selection::where('interview_id', $application->interview->id)->first();
                if(empty($selection))
                {
                    $application->selection = "";
                }else{
                    $application->selection = $selection;
                }
            }
        }
        
        // dd($applications);
        
        return view('frontend.profile.interview', compact('applications'));
    }
    
    // public function interviews()
    // {
    //     $interviews = Interview::where('user_id', auth()->user()->id)->with('job')
    //         ->orderBy('scheduled_at', 'desc') // Fetch interviews in descending order of schedule date
    //         ->paginate(3);
        
    //     return view('frontend.profile.interview', compact('interviews'));
    // }


}
