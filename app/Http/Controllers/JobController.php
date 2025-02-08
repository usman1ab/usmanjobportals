<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
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
use Illuminate\Support\Facades\Auth;
 use Illuminate\Pagination\LengthAwarePaginator;
 use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use DB;

class JobController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['employer','verified'], ['except'=> array('index', 'show', 'apply', 'allJobs', 'category', 'searchJobs')]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->limit(15)->where('status', 1)->get();
      
       
        $companies = Company::inRandomOrder()->take(12)->get();

        // $companies = Company::get()->random(12);

        $posts = Post::where('status', 1)->get();

        $testimonial = Testimonial::where('status', 1)->get()->first();
        $categories = Category::where('status', 1)->get();
        // $allprosal = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('welcome', compact('jobs','companies', 'categories', 'posts', 'testimonial'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  

public function store(JobPostRequest $request)
{
    
    if (!auth()->check()) {
        return redirect('login');
    }

    $user = auth()->user();
    $user_id = $user->id;
    $company = null;

    if ($user->user_type == 'employer') {
        $company = Company::where('user_id', $user_id)->first();
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }
        $company_id = $company->id;
    } else {
        $company_id = $user->company_id;
        $company = Company::find($company_id);
    }

    if (!$company) {
        return redirect()->back()->with('error', 'Company details not found.');
    }

    // Create job
    $job = Job::create([
        'user_id' => $user_id,
        'company_id' => $company_id,
        'title' => $request->input('title'),
        'slug' => Str::slug($request->input('title')),
        'description' => $request->input('description'),
        'roles' => $request->input('roles'),
        'category_id' => $request->input('category'),
        'position' => $request->input('position'),
        'education' => $request->input('education'),
        'diploma' => $request->input('diploma'),
        'certification' => $request->input('certification'),
        'address' => $request->input('address'),
        'country' => $request->input('country'),
        'city' => $request->input('city'),
        'status' => 1,
        'type' => $request->input('type'),
        'experience' => $request->input('experience'),
        'number_of_vacancy' => $request->input('number_of_vacancy'),
        'gender' => $request->input('gender'),
        'salary' => $request->input('salary'),
        'last_date' => $request->input('last_date'),
    ]);
 $edu = $job->education;
$diploma = $job->diploma;
$certi = $job->certification;
$position = $job->position;

// Convert job role and description into separate keywords

$keywords = array_filter(array_merge(
   
    explode(' ', $position),
    explode(' ', $edu),
    explode(' ', $diploma),
    explode(' ', $certi)
));

$users = User::where('user_type', 'seeker')
    ->whereHas('profile', function ($query) use ($keywords) {
        $query->where(function ($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                $q->orWhere('skills', 'LIKE', "%{$keyword}%")
                  ->orWhere('education', 'LIKE', "%{$keyword}%")
                  ->orWhere('diploma', 'LIKE', "%{$keyword}%")
                  ->orWhere('certification', 'LIKE', "%{$keyword}%");
            }
        });
    })->get();

// Check if users are found

    // Send email notifications
    foreach ($users as $user) {
        $email = $user->email;
        
        $data = [
            'subject' => 'New Job Alert - ' . $job->title,
            'job' => $job->title,
            'job_slug' => $job->slug,
            'job_description' => $job->description,
            'job_id' => $job->id,
            'user' => $user->id,
            'name' => $user->name,
            'company' => $company->cname,
        ];

        try {
            Mail::send('email_layout', $data, function ($message) use ($email, $data) {
                $message->to($email);
                $message->subject($data['subject']);
                $message->priority(3);
            });
       
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
        }
    }

    return redirect()->back()->with('success', 'Job posted successfully and notifications sent.');
}


    /**
     * Display All jobs.
     */
public function allJobs(Request $request)
{
    
    $query = Job::query();

    // Search functionality
    if ($request->has('search') && $request->search) {
        $title = $request->search;
        $query->where(function ($q) use ($title) {
            $q->where('title', 'LIKE', '%' . $title . '%')
                ->orWhere('type', $title)
                ->orWhere('category_id', $title)
                ->orWhere('address', $title);
        });
    }

    // Filter by country
    if ($request->has('countries') && !empty($request->countries)) {
        $query->whereIn('country', $request->countries);
    }

    // Filter by city
    if ($request->has('cities') && !empty($request->cities)) {
        $query->whereIn('city', $request->cities);
    }

    // Sorting functionality
    if ($request->has('sort') && $request->sort) {
        if ($request->sort === 'relevance') {
            $query->orderBy('id', 'desc'); // Example field for relevance
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting by posted date
        }
    }

    // Fetch jobs with relations and paginate
    $jobs = $query->where('status', 1)
                  ->with('company', 'category')
                  ->paginate(4);

    // Return the view with jobs data
    return view('frontend.jobs.alljobs', compact('jobs'));
}


    
    /**
     * Display the specified resource.
     */
    public function show( $id, Job $job)
    {

        $jobRecommendation = $this->jobRecommendation ($job);
        return view('frontend.jobs.show', compact('job', 'jobRecommendation'));
    }

    public function jobRecommendation ($job){
        $data = [];

       $jobBasedOnCategory = Job::latest()
                            ->where('category_id', $job->category_id)
                            ->whereDate('last_date', '>', date('y-m-d'))
                            ->where('id', '!=', $job->id)
                            ->where('status', 1)
                            ->limit(5)
                            ->get();

        array_push($data, $jobBasedOnCategory);

       $jobBasedOnCompany = Job::latest()
                            ->where('company_id', $job->company_id)
                            ->whereDate('last_date', '>', date('y-m-d'))
                            ->where('id', '!=', $job->id)
                            ->where('status', 1)
                            ->limit(5)
                            ->get();
        array_push($data, $jobBasedOnCompany);
        $jobBasedOnPosition = Job::latest()
                            ->where('position', 'LIKE', '%'.$job->position.'%')
                            ->where('status', 1)
                            ->limit(5);
                            

        array_push($data, $jobBasedOnCompany, $jobBasedOnCategory, $jobBasedOnPosition);

        $collection = collect($data);
        $unique = $collection->unique('id');
        $jobRecommendation = $unique->values()->first();
        return $jobRecommendation;
    }


    /**
     * Single company all jobs
     */
    public function myjob()
    {
         if (!auth()->check()) {
        return redirect('login');
    }
        $user_id = auth()->user()->id;
        // dd(auth()->user()->id);
        if(auth()->user()->user_type == 'employer'){
            $company = Company::where('user_id', $user_id)->first();
            $company_id = $company->id;
        }else{
            $company_id = auth()->user()->company_id;
        }
        
        $jobs = Job::where('company_id', $company_id)->paginate(10);
        
        // $jobs = Job::where('user_id', auth()->user()->id)->get();
        
        $users = User::where('user_type', 'seeker')->where('status', 1)->get();
        return view('frontend.jobs.myjobs', compact('jobs','users'));
    }

    public function edit($id){
         if (!auth()->check()) {
        return redirect('login');
    }
        $job = Job::findOrFail($id);
        return view('frontend.jobs.edit', compact('job'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         if (!auth()->check()) {
        return redirect('login');
    }
        $job = Job::findOrFail($id);
        $job->update($request->all());
                
        return redirect()->back()->with('success', 'Job updated Successfully.');
    }

    /**
     * Job apply method.
     */
    public function apply(Request $request,$id){
         if (!auth()->check()) {
        return redirect('login');
    }
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
    
        return redirect()->back()->with('message', 'Job applied Successfully.');
    }
    
    
    /**
     * Refer Candidate method.
     */
    public function refer(Request $request){
        
         if (!auth()->check()) {
        return redirect('login');
    }
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $job = Job::find($request->job_id);
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }
        $user = User::find($request->user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        
        // $exists =  DB::table('job_user')->where('referred_by', auth()->user()->id)->where('user_id', $request->user_id)->where('job_id', $request->job_id)->first();
        if(DB::table('job_user')->where('referred_by', auth()->user()->id)->where('user_id', $request->user_id)->where('job_id', $request->job_id)->first()) {
            return redirect()->back()->with('error', 'Candidate Alleady Referred.');
        
        }elseif(DB::table('job_user')->where('user_id', $request->user_id)->where('job_id', $request->job_id)->first()){
            DB::table('job_user')->where('user_id', $request->user_id)->where('job_id', $request->job_id)->update([
                'referred_by'=> auth()->user()->id,
                ]);
        }else{
            DB::table('job_user')->insert([
                'user_id'=> $request->user_id,
                'job_id'=> $request->job_id,
                'referred_by'=> auth()->user()->id,
                ]);
        }
    
        return redirect()->back()->with('success', 'Candidate Referred Successfully.');
    }





public function applicant()
{
    if (!auth()->check()) {
        return redirect('login');
    }
    $user_id = auth()->user()->id;

    if (auth()->user()->user_type == 'employer') {
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
    } else {
        $company_id = auth()->user()->company_id;
    }

    $applicants = Job::has('users')->where('company_id', $company_id)->orderBy('id','desc')->paginate(4);

    foreach ($applicants as $applicant) {
        $job = $applicant->id;

        // Paginate the users for each job
        $users = $applicant->users;

        $perPage = 4; // Define how many users per page
        $currentPage = request()->input('user_page', 1); // Get the current page for users
        $usersPaginated = new LengthAwarePaginator(
            $users->forPage($currentPage, $perPage), // Slice the users collection
            $users->count(), // Total number of users
            $perPage,
            $currentPage,
            ['path' => url()->current(), 'pageName' => 'user_page'] // Pagination URL and parameter name
        );

        // Add the paginated users to the applicant
        $applicant->paginatedUsers = $usersPaginated;

        // Add selection data for paginated users
        foreach ($usersPaginated as $user) {
            $id = $user->id;
            $user->selection = Selection::where(['user_id' => $id, 'job_id' => $job])->first();
        }
    }

    return view('frontend.jobs.applicants', compact('applicants'));
   
}

    
 public function applied($job_id)
{
     if (!auth()->check()) {
        return redirect('login');
    }
    $user_id = auth()->user()->id;

    if ($user_id) {
        // Determine company ID based on user type
        if (auth()->user()->user_type == 'employer') {
            $company = Company::where('user_id', $user_id)->first();
            $company_id = $company->id;
        } else {
            $company_id = auth()->user()->company_id;
        }

        // Fetch job applicants
        $applicants = Job::has('users')->where(['id' => $job_id, 'company_id' => $company_id])->first();
         $job = $applicants->id;
            foreach($applicants->users as $user)
            {
                $id = $user->id;
                $user->selection = Selection::where(['user_id'=> $id,'job_id' => $job])->first();
            }
        // Return view with applicants
        return view('frontend.jobs.applicant', compact('applicants'));
    } else {
        // Redirect to login if user is not authenticated
        return redirect('login');
    }
}   
    public function filter_applicants($job_id){
        // $job_id = '203';
        $job = Job::where('id', $job_id)->first();
        $job_desc = $job->title. '.' .$job->description. '.' .$job->roles. '.' .$job->position. '.' .$job->experience;
        $job_users = DB::table('job_user')->where('job_id', $job_id)->get('user_id');
        
        $user_deta = [];
        foreach($job_users as $user){
            $user_details = User::where('id', $user->user_id)->first();
            $user_profile = Profile::where('user_id', $user->user_id)->first();
            $user_deta[] = [
            'name' => $user_details->name,
            'email' => $user_details->email,
            'bio' => $user_profile->bio,
            'experience' => $user_profile->experience,
            'skills' => $user_profile->skills,
            'specialization' => $user_profile->specialization
            ];
        }

        $data = json_encode([
            'job_desc' => $job_desc,
            'resumes' => $user_deta,
            "top_n" => 4,
            "threshold" => 0.6
        ]);
        // dd($data);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://127.0.0.1:8000/cv-selection',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$data,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $resumes = json_decode($response);
        $ranked_userss = $resumes->ranked_resumes;
        $ranked_users = collect($ranked_userss)->sortByDesc('score');

        foreach($ranked_users as $ranked_user){
            $user_detail = User::where('email', $ranked_user->email)->first();
            $user_profile = Profile::where('user_id', $user_detail->id)->first();
            $ranked_user->user = $user_detail;
            $ranked_user->profile = $user_profile;
            $ranked_user->job = $job;
            
            $interview = Interview::where('user_id', $user_detail->id)->where('job_id', $job->id)->first();
            if(empty($interview))
            {
                $ranked_user->interview = "";
            }else{
                $ranked_user->interview = $interview;
                $selection = Selection::where('interview_id', $interview->id)->first();
                if(empty($selection))
                {
                    $ranked_user->selection = "";
                }else{
                    $ranked_user->selection = $selection;
                }
            }     
        }

        
        // dd($ranked_users);
        // die();
        return view('frontend.jobs.filtered_applicants', compact('ranked_users'))->with('success', 'Job Applicants Filtered Successfully.');

    }
    
    
    public function myreferrals(){
         if (!auth()->check()) {
        return redirect('login');
    }
        $referrals = DB::table('job_user')->where('referred_by', auth()->user()->id)->paginate(10);
        foreach ($referrals as $referral){
            $referral->user = User::where('id', $referral->user_id)->first();
            $referral->profile = Profile::where('user_id', $referral->user_id)->first();
            $referral->job = Job::where('id', $referral->job_id)->first();
            $interview = Interview::where('user_id', $referral->user_id)->where('job_id', $referral->job_id)->first();
            if(empty($interview))
            {
                $referral->interview = "";
            }else{
                $referral->interview = $interview;
                $selection = Selection::where('interview_id', $referral->interview->id)->first();
                if(empty($selection))
                {
                    $referral->selection = "";
                }else{
                    $referral->selection = $selection;
                }
            }
            if(empty($referral->job))
            {
                $referral->job ="";
            }
        }
        
        return view('frontend.jobs.myreferrals', compact('referrals'));
    }

    // Search Jobs in 
    public function searchJobs(Request $request){

       
        $keyword = $request->get('keyword');
        $users = Job::where('title','like','%'.$keyword.'%')
                ->orWhere('position','like','%'.$keyword.'%')
                ->orWhere('address','like','%'.$keyword.'%')
                ->get();
        return response()->json($users);

    }

    // Job active/deactive 
    public function jobToggle($id){
         if (!auth()->check()) {
        return redirect('login');
    }
        $jobtoggle = Job::find($id);
        $jobtoggle->status = !$jobtoggle->status;
        $jobtoggle->save();

        return redirect('/jobs/myjobs')->with('success', 'Status Updated Successfully!');
    }

    // Job Deleted 
    public function deleteJob(Request $request, string $id){
        
         if (!auth()->check()) {
        return redirect('login');
    }
        $jobDel = Job::find($id);
        $jobDel->delete();
        return redirect()->back()->with('success', 'Job Deleted Successfully!');
    }
     public function interview(Request $request)
    {
         if (!auth()->check()) {
        return redirect('login');
    }
        // Validate the request
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date',
            'location' => 'nullable|string|max:255',
            'link' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        // Create the interview record
        $interview=Interview::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'scheduled_at' => $request->scheduled_at,
            'location' => $request->location ?? "",
            'link' => $request->link ?? "",
            'notes' => $request->notes,
            'status' => 'open',
        ]);

        // Retrieve the user and company information
        $user = User::find($request->user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $user_email = $user->email;
        $users_name = $user->name;

        $job = Job::find($request->job_id);
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }

        $company_user = User::find($job->user_id);
        $user_id = $company_user->company_id;
        $company = Company::where('id',$user_id)->first();
        if (!$company_user) {
            return redirect()->back()->with('error', 'Company user not found.');
        }
        $company_email = $company_user->email;
          $companyname = $company_user->name;
        $company_name = $company->cname;
        $position = $job->position;
        $job_name = $job->title;
        $date_time= $interview->scheduled_at;
        
        // Email array
        $array = [
            'subject' => 'Interview Schedule confirmation',
            'scheduled_at' => $request->scheduled_at,
            'location' => $request->location ?? "",
             'link' => $request->link ?? "",
             'company' => $company_name,
             'email'=> $company_email,
             'job' => $job_name,
             'position' => $position,
             'date_time' => $date_time,
             'name' =>  $companyname,
             'user_name' => $users_name,
             
        ];

        // Send emails
        Mail::send('email', $array, function ($message) use ($user_email, $company_email,$company_name, $array) {
            $message->from($company_email, $company_name);
            $message->to($user_email);
            $message->subject($array['subject']);
            $message->priority(3);
        });

        // Mail::send('email', $array, function ($message) use ($company_email, $array) {
        //     $message->from('usmakhalidandali@gmail.com', 'MtechSoft');
        //     $message->to($company_email);
        //     $message->subject($array['subject']);
        //     $message->priority(3);
        // });

        // Redirect back with success message
        return redirect()->back()->with('success', 'Interview scheduled successfully.');
    }
    
    
 public function interviews()
{
    $user_id = auth()->user()->id;
    if (auth()->user()->user_type == 'employer') {
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
    } else {
        $company_id = auth()->user()->company_id;
    }

    $interview = Interview::where('status', 'open')
        ->whereHas('job', function ($q) use ($company_id) {
            $q->where('company_id', $company_id);
        })->with('score', 'user', 'job')->paginate(5);

    return view('frontend.jobs.interview', compact('interview'));
}

    
    
    // store feedback
    // store feedback
    public function feedback(Request $request)
    {
         if (!auth()->check()) {
        return redirect('login');
    }
     $interview =FeedBack::where(['interview_id' => $request->interviewid,'employee_id' => $request->user_id])->first();
     $selection = Selection::where('interview_id' , $request->interviewid)->first();
   if(empty($selectione))
   {
      $data = new Selection;
      $data->interview_id = $request->interviewid;
      $data->user_id = $request->user;
      $data->job_id = $request->job;
      $data->status = 'pending';
      $data->save();
   }
     if(empty($interview))
     {
         $data = new FeedBack;
         $data->interview_id = $request->interviewid;
         $data->user_id = $request->user;
         $data->job_id = $request->job;
         $data->employee_id = $request->user_id;
         $data->employee_type = $request->user_type;
         $data->q1 = $request->q1;
         $data->q2 =$request->q2;
         $data->q3 =$request->q3;
         $data->q4 =$request->q4;
         $data->q5 =$request->q5;
         $data->q6 =$request->q6;
         $data->q7 =$request->q7;
         $data->q8 =$request->q8;
         $data->q9 =$request->q9;
         $data->recommend =$request->radio_typ;
         $data->save();
     }else
     {
        return redirect()->back()->with('success', 'your already add your feedback');
     }
     return redirect()->back()->with('success', 'Interview Feedback Added successfully.');
    }
    
    
    public function feedbacks($id)
    {
    $data = FeedBack::where('interview_id', $id)->with('interview')->paginate(1); // Retrieve feedback data
    foreach ($data as $datas) { // Iterate through each feedback item
        $user = User::find($datas->user_id); // Find the user by ID
        $employ = User::find($datas->employee_id); // Find the employee by ID
        $job = Job::find($datas->job_id); // Find the job by ID (corrected from $data to $datas)

        $datas->user_name = $user->name ?? 'N/A'; // Add user_name to each feedback item
        $datas->employee = $employ->name ?? 'N/A'; // Add employee name
        $datas->employee_type = $employ->user_type ?? 'N/A'; // Add employee name
        $datas->job = $job->title ?? 'N/A';
        // $name = $datas->user_name;
        // $jo =  $datas->job;
    }
    return view('frontend.profile.feedback', compact('data')); // Pass data to the view
}
public function track_application()
{
    $user_id = auth()->user()->id; // Fixed typo in $company_id
    if(auth()->user()->user_type == 'employer'){
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
    }else{
        $company_id = auth()->user()->company_id;
    }
    $jobs = Job::where('company_id', $company_id)->latest()->with('users','company')->paginate(2);

    foreach ($jobs as $job) {
        $job_id = $job->id; // Correctly assign the job ID
        $job->applicant = $job->users()->count(); // Count related users
        $job->shortlisted = Interview::where('job_id', $job_id)->count(); // Count shortlisted candidates
        $job->interview = Selection::where(['job_id' => $job_id, 'status' => 'pending'])->count(); // Count pending interviews
        $job->selected = Selection::where(['job_id' => $job_id, 'status' => 'selected'])->count(); // Count selected candidates
    }

    return view('frontend.jobs.index', compact('jobs')); // Use 'jobs' instead of 'job' for consistency
}

public function reschedule($id)
{
    if (auth() && auth()->user()->user_type == 'seeker') {
        $job = Job::find($id);
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }

        $recruiter = User::find($job->user_id);
        $company = Company::find($job->company_id);
        if (!$recruiter || !$company) {
            return redirect()->back()->with('error', 'Recruiter or company not found.');
        }

        $company_user = User::find($company->user_id);
        if (!$company_user) {
            return redirect()->back()->with('error', 'Company user not found.');
        }

        $recruiter_email = $recruiter->email;
        $company_email = $company_user->email;
        $user_email = auth()->user()->email;
        $name = auth()->user()->name;

        $array = [
            'subject' => 'Reschedule',
            'job' => $job->title,
            'job_id' => $job->id,
            'user' => auth()->user()->id,
            'name' => $name,
            'company' => $company->cname,
        ];

        try {
            Mail::send('emails', $array, function ($message) use ($user_email, $company_email, $recruiter_email, $name, $array) {
                $message->from($user_email, $name);
                $message->to([$company_email, $recruiter_email]);
                $message->subject($array['subject']);
                $message->priority(3);
            });

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'The interview request has been sent successfully.');
    } else {
        return redirect('login');
    }
}
//onboarding candidates


public function onboar()
{
   $data = Selection::where('status','selected') ->get();
   foreach($data as $datas)
   {
       $datas->user_name = User::find($datas->user_id);
       $id = $datas->user_id;
       $job = $datas->job_id;
       $datas->user = Profile::where('id',$id)->where('country', '!=' ,'Saudi Arabia')->first();
       $datas->job = Job::where('id',$job)->first();
   }
   return view('frontend.jobs.onboarding',compact('data'));
}

public function onboard(request $request, $id)
{
 $data = Selection::find($id);
         if ($request->hasFile('visa'))
    {
           
            $file = $request->file('visa');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/avatar/'), $filename);
            $data->visa = $filename;
            $data->save();
            $id = auth()->user()->company_id;
            $company = Company::find($id);
            $user = User::find($data->user_id);
            $user_email = $user->email;
            $comp = User::find($company->user_id);
            $company_email = $comp->email;
            $name =$company->cname;
              $array = [
            'subject' => 'Visa Detail',
            'filename' => $data->visa,
            'name' => $user->name,
            'company' => $company->cname,
        ];

        try {
            Mail::send('visa', $array, function ($message) use ($user_email, $company_email,  $name, $array) {
                $message->from($company_email, $name);
                $message->to($user_email);
                $message->subject($array['subject']);
                $message->priority(3);
            });

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
        }
    }
    if($request->visa_name)
    {
        $data->visa ="";
        $data->save();
    }
           if ($request->hasFile('flight'))
    {
           
            $file = $request->file('flight');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/avatar/'), $filename);
            $data->flight = $filename;
            $data->save();
             $id = auth()->user()->company_id;
            $company = Company::find($id);
            $user = User::find($data->user_id);
            $user_email = $user->email;
            $comp = User::find($company->user_id);
            $company_email = $comp->email;
            $name =$company->cname;
              $array = [
            'subject' => 'Flight Ticket',
            'filename' => $data->flight,
            'name' => $user->name,
            'company' => $company->cname,
        ];

        try {
            Mail::send('flight', $array, function ($message) use ($user_email, $company_email,  $name, $array) {
                $message->from($company_email, $name);
                $message->to($user_email);
                $message->subject($array['subject']);
                $message->priority(3);
            });

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
        }
    }
        if($request->flight_name)
    {
        $data->flight ="";
        $data->save();
    }
      
        if ($request->hasFile('Housing'))
    {
           
            $file = $request->file('Housing');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/avatar/'), $filename);
            $data->housing = $filename;
            $data->save();
                  $id = auth()->user()->company_id;
            $company = Company::find($id);
            $user = User::find($data->user_id);
            $user_email = $user->email;
            $comp = User::find($company->user_id);
            $company_email = $comp->email;
            $name =$company->cname;
              $array = [
            'subject' => 'Housing Insurance',
            'filename' => $data->housing,
            'name' => $user->name,
            'company' => $company->cname,
        ];

        try {
            Mail::send('housing', $array, function ($message) use ($user_email, $company_email,  $name, $array) {
                $message->from($company_email, $name);
                $message->to($user_email);
                $message->subject($array['subject']);
                $message->priority(3);
            });

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
        }
    }
       if($request->housing_name)
    {
        $data->housing ="";
        $data->save();
    }
     return redirect()->back()->with('success', 'The action perform successfully.');
}

}
