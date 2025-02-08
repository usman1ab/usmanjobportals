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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;
use DB;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except'=> array('index', 'company')]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id, Company $company)
    {   $jobs = Job::where('user_id', $id)->get();
        return view('frontend.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'address' => 'required|max:450',
            'phone'=> 'required|digits:11',
            'website'=> 'required',
            'slogan'=> 'required|max:100',
            'description'=> 'required|max:4000',
        ]);


        Company::where('user_id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'website'=> request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description'),
          
        ]);


        return redirect()->back()->with('success', 'Company Info Successfully Updated.');
    }

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'logo' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            // Retrieve the old logo filename
            $oldLogo = Company::where('user_id', $user_id)->value('logo');
      

            // Delete the old logo file
            if(is_file(public_path('uploads/logo/' . $oldLogo))){
                unlink(public_path('uploads/logo/' . $oldLogo));
                
            }
    
            $file->move('uploads/logo/', $filename);
    
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
    
            return redirect()->back()->with('logo', 'Logo updated...');
        }
    }


    public function banner(Request $request){
        $user_id = auth()->user()->id;
        
        $request->validate([
            'banner' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            // Retrieve the old banner filename
            $oldBanner = Company::where('user_id', $user_id)->value('banner');
      

            // Delete the old banner file
            if(is_file(public_path('uploads/banner/' . $oldBanner))){
                unlink(public_path('uploads/banner/' . $oldBanner));
                
            }
    
            $file->move('uploads/banner/', $filename);
    
            Company::where('user_id', $user_id)->update([
                'banner' => $filename
            ]);
    
            return redirect()->back()->with('banner', 'Banner updated...');
        }



    }
    /**
     * Compnay metod
     */
    public function company()
    {
        $companies = Company::latest()->paginate(12);
        return view('frontend.company.company', compact('companies'));
    }

    public function mystaff()
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        
        $users = User::where('company_id', $company_id)->latest()->paginate(12);
        return view('frontend.company.mystaff', compact('users'));
    }
    
    public function updatestaff(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        if(empty($user))
        {
            return back()->with('errors', 'User does not exists!');
        }
    
        if($user->user_type != 'seeker')
        {
            User::where('id',$user_id)->update([
                'name' => request('name'),
                'email' => request('email'),
                'user_type' => request('user_type'),
            ]);
        }
        
        return redirect()->back()->with('success', 'Staff Info Successfully Updated.');
    }
    
    public function UserToggle($id){
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }
    
    public function destroyUser(Request $request, string $id){
        // $id = $request->get('id');
        $user = User::find($id);
        $profile = Profile::where('user_id', $id)->first();
        $user->delete();
        $profile->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully!');
    }
}
