<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\HiringManagerController;
use App\Http\Controllers\InterviewerController;
use App\Http\Controllers\HrManagerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('demo', 'demo');


// Auth routes
 Auth::routes(['verify' => true]);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Home Routes
Route::get('/', [JobController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/jobs/alljobs', [JobController::class, 'allJobs'])->name('alljobs');

Route::view('company/register', 'auth.company-register')->name('company.register');
Route::post('company/register', [EmployerRegisterController::class, 'companyRegister'])->name('company.register');


Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::post('/jobs/create', [JobController::class, 'store'])->name('job.store');
Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::post('/job/{id}/edit', [JobController::class, 'update'])->name('job.update');
Route::post('/job/{id}/delete', [JobController::class, 'deleteJob'])->name('job.delete');
Route::get('/jobs/myjobs', [JobController::class, 'myjob'])->name('myjobs');
Route::get('/jobs/applications', [JobController::class, 'applicant'])->name('applicant');
Route::get('/filter/applications/{job_id}', [JobController::class, 'filter_applicants'])->name('filter_applicants');
Route::get('/jobs/applied/{job_id}', [JobController::class, 'applied'])->name('job.applied');
Route::get('/jobs/myreferrals', [JobController::class, 'myreferrals'])->name('myreferrals');
Route::get('/jobs/interviews', [JobController::class, 'interviews'])->name('interviews');
Route::post('/jobs/feedback', [JobController::class, 'feedback'])->name('feedback');
Route::get('/jobs/feedbacks/{id}', [JobController::class, 'feedbacks'])->name('feedbackss');
Route::get('/job/{id}/{job}', [JobController::class, 'show'])->name('job.show');
Route::get('/jobs/toggle/{id}', [JobController::class, 'jobToggle'])->name('job.toggle');
Route::get('/jobs/track_application', [JobController::class, 'track_application'])->name('job.track_application');
Route::get('/jobs/reschedule/{job_id}', [JobController::class, 'reschedule'])->name('job.reschedule');
Route::get('/jobs/onboar', [JobController::class, 'onboar'])->name('job.onboar');
Route::post('/jobs/onboard/{id}', [JobController::class, 'onboard'])->name('job.onboard');

// user profile
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile')->middleware('seeker');
Route::get('/user/applications', [UserProfileController::class, 'my_applications'])->name('user.applications')->middleware('seeker');
Route::get('/user/interview', [UserProfileController::class, 'interview'])->name('user.interview')->middleware('seeker');
Route::post('/user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');
Route::post('/user/coverletter', [UserProfileController::class, 'coverletter'])->name('cover.letter')->middleware('seeker');
Route::post('/user/resume', [UserProfileController::class, 'resume'])->name('resume')->middleware('seeker');
Route::post('/user/avatar', [UserProfileController::class, 'avatar'])->name('avatar');
Route::get('/user/save', [HomeController::class, 'save'])->name('user.save');

// Save job or unsave job
Route::post('/save/{id}', [FavoriteController::class, 'saveJob'])->name('save');
Route::post('/unsave/{id}', [FavoriteController::class, 'unSaveJob'])->name('unsave');



Route::get('/staff/profile', [UserProfileController::class, 'staff_profile'])->name('staff.profile');

//Recruiter
// Route::get('/recruiter/profile', [RecruiterController::class, 'index'])->name('recruiter.profile');
Route::post('/recruiter/reschedule/{id}', [RecruiterController::class, 'reschedule'])->name('recruiter.reschedule');


//hiring_manager
// Route::get('/hiring_manager/profile', [HiringManagerController::class, 'index'])->name('hiring_manager.profile');
Route::get('/hiring_manager/selection', [HiringManagerController::class, 'selection'])->name('selection');
Route::post('/hiring_manager/toggle/{action}/{id}', [HiringManagerController::class, 'toggle'])->name('toggle');


//interviewer
// Route::get('/interviewer/profile', [InterviewerController::class, 'index'])->name('interviewer.profile');


//hr_manager
// Route::get('/hr_manager/profile', [HrManagerController::class, 'index'])->name('hr_manager.profile');


//employee
// Route::get('/employee/profile', [EmployeeController::class, 'index'])->name('employee.profile');


// Company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('/company/logo', [CompanyController::class, 'logo'])->name('logo');
Route::post('/company/banner', [CompanyController::class, 'banner'])->name('banner');
Route::get('/company/mystaff', [CompanyController::class, 'mystaff'])->name('mystaff');
Route::post('/company/updatestaff', [CompanyController::class, 'updatestaff'])->name('updatestaff');
Route::get('/user/toggle/{id}', [CompanyController::class, 'UserToggle'])->name('UserToggle');
Route::post('/user/{id}/delete', [CompanyController::class, 'destroyUser'])->name('user.delete');

// Employer
// Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('staff/register', [EmployerRegisterController::class, 'StaffRegister'])->name('empl.register');

// Applicant
Route::post('/applications/{id}', [JobController::class, 'apply'])->name('apply');

Route::post('/refer_candidate', [JobController::class, 'refer'])->name('candidate.refer');

// interview
Route::post('/interview', [JobController::class, 'interview'])->name('interview');




// Search route
Route::get('/jobs/search', [JobController::class, 'searchJobs']);

// Category route
Route::get('/category/{id}/{slug}', [CategoryController::class, 'index'])->name('category.index');

// Company route
Route::get('/companies', [CompanyController::class, 'company'])->name('company');

// Email Route
Route::post('/job/mail', [EmailController::class, 'send'])->name('mail');

Route::get('change-language/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return redirect()->back();
})->name('changeLanguage');




Route::prefix('dev')->group(function(){
	Route::get('config-clear', function(){
		try{
			\Artisan::call('config:clear');
			echo "Configuration cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('optimize-clear', function(){
		try{
			\Artisan::call('optimize:clear');
			echo "Optimize cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-clear', function(){
		try{
			\Artisan::call('route:clear');
			echo "Route cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('view-clear', function(){
		try{
			\Artisan::call('view:clear');
			echo "View cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('config-cache', function(){
		try{
			\Artisan::call('config:cache');
			echo "Configuration cache cleared!";
			echo "Configuration cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-cache', function(){
		try{
			\Artisan::call('route:cache');
			echo "Route cache cleared!";
			echo "Route cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('make-mail', function(){
		try{
			\Artisan::call('make:mail ForgotPasswordMail --markdown=emails.forgotpasswordmail');
			echo "Email Created!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});
