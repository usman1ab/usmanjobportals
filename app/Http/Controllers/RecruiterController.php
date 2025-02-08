<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class RecruiterController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.recruiter.index');
    }
   public function reschedule(Request $request, $id)
{
    // Find the interview by ID
    $interview = Interview::find($id);

    if (!$interview) {
        return redirect()->back()->withErrors('Interview not found.');
    }

    // Update the interview details
    $interview->scheduled_at = $request->scheduled;

    if ($request->upload_method === 'Site') {
        $interview->location = $request->location;
        $interview->link = ""; // Clear the link if it's an OnSite interview
    } elseif ($request->upload_method === 'Line') {
        $interview->link = $request->link;
        $interview->location = ""; // Clear the location if it's an Online interview
    }

    $interview->notes = $request->notes;
    $interview->save();

    return redirect()->back()->with('success', 'Interview rescheduled successfully.');
}

}
