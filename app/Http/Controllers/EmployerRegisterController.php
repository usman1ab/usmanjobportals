<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function companyRegister(Request $request)
    {


        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cname'=> 'required|unique:companies,cname|max:50',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user =  User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
            'status' => '1',
        ]);


        Company::create([
            'user_id'=>$user->id,
            'cname'=> request('cname'),
            'slug'=> Str::slug(request('cname'))
        ]);

        // $user->sendEmailVerificationNotification();

        return redirect()->back()->with('message', 'Registered successfully! You Can login After Administrator verify it.');
    }
    
    
    public function StaffRegister(Request $request)
    {
$request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
            'company_id' => request('company_id'),
        ]);
        Profile::create([
            'user_id'=>$user->id,
            // 'gender'=> request('gender'),
            // 'dob'=> request('dob')
        ]);

        
        return redirect()->back()->with('success', 'Employee Registered successfully!');
    }


}
