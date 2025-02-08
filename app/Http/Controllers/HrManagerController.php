<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HrManagerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.hr_manager.index');
    }

}
