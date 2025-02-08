<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Interview;
use App\Models\Selection;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Mail;
use DB;

class HiringManagerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.hiring_manager.index');
    }
  public function selection()
{
    if (!auth()->check()) {
        return redirect('login');
    }  
    $user = auth()->user();

    if ($user && $user->company_id) {
        $companyId = $user->company_id;

        $data = Interview::whereHas('score', function ($query) {
            $query->where('status', '!=', '');
        })
        ->whereHas('job', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->with(['user', 'job', 'score'])
        ->paginate(8);

        return view('frontend.hiring_manager.selection', compact('data'));
    } else {
        return redirect('login');
    }
}


public function toggle(Request $request, $action, $id)
{
   if(auth()->user())
   {
    $data = Selection::findOrFail($id);

    if ($action === 'selected') {
        if ($request->hasFile('selected'))
    {
           
            $file = $request->file('selected');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/avatar/'), $filename);
            $data->offer = $filename;
            $data->status = 'selected';
            $company_email =auth()->user()->email;
            $user = User::find($data->user_id);
            $company = Company::find(auth()->user()->company_id);
            $job = Job::find($data->job_id);
            $user_name =  $user->name;
            $user_email = $user->email;
             $array = [
            'subject' => 'Selection',
            'file_name' =>  $data->offer,
            'name' => $user_name,
            'job_name' => $job->title,
            'email' => $company_email,
            'company' => $company->cname,
        ];
          try {
    Mail::send('emai', $array, function ($message) use ($user_email, $company_email, $array) {
        $message->from($company_email, 'MtechSoft');
        $message->to($user_email);
        $message->subject($array['subject']);
        $message->priority(3);
    });
  
} catch (\Exception $e) {
    return redirect()->back()->with('error', 'Mail error: ' . $e->getMessage());
}

            
        } else {
            return redirect()->back()->with('error', 'No file uploaded');
        }
    } 
    if ($action === 'rejected')
    {
       
        $data->offer = "";
        $data->status = 'rejected';
                $company_email =auth()->user()->email;
                $company_name =auth()->user()->name;
            $user = User::find($data->user_id);
          $company = Company::find(auth()->user()->company_id);
           $job = Job::find($data->job_id);
            
            $user_email = $user->email;
             $array = [
            'subject' => 'Message',
            'user' => $user->name,
               'job_name' => $job->title,
            'hr_email' => $company_email,
            'hr_name' => $company_name,
            'company' => $company->cname,
        ];
              Mail::send('welcome_old', $array, function ($message) use ($user_email, $company_email, $array) {
            $message->from($company_email, 'MtechSoft');
            $message->to($user_email);
            $message->subject($array['subject']);
            $message->priority(3);
        });
    } 
    if ($action === 'pending') 
    {
        $data->offer = "";
        $data->status = 'pending';
    }

    $data->save();
    return redirect()->back()->with('success', 'The action is performed successfully');
   }
   else
   {
       return redirect('login');
   }
}


}
