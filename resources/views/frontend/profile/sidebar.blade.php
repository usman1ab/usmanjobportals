<div class="sidebar">
    <div class="profile-sidebar position-relative">
        @if (!empty(Auth::user()->profile->avatar))
            <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="profile image" class="img-fluid rounded-circle">
        @else
            <img src="https://i.pravatar.cc/150" alt="profile image" class="img-fluid rounded-circle">
        @endif

        <!-- Edit Icon -->
        <a href="#" class="edit-icon position-absolute top-0 start-100 translate-middle bg-info text-white p-2 rounded-circle"
           data-bs-toggle="modal" data-bs-target="#editImageModal" style="cursor: pointer;">
            <i class="bi bi-pencil"></i>
        </a>

        <div class="user-info">
            @if(Auth::user()->user_type === 'employer')
                <h1>{{ Auth::user()->company->cname ?? "" }}</h1>
            @else
                <h1>{{ Auth::user()->name ?? "" }}</h1>
            @endif
            @if(Auth::user()->user_type === 'seeker')
                <p>{{ Auth::user()->profile->specialization ?? "" }}</p>
            @elseif(Auth::user()->user_type === 'employer')
                <p>{{ __('sidebar.hospital') }}</p>
            @else
                <p>{{ Auth::user()->user_type ?? "" }}</p>
            @endif

            <!-- Rating Stars -->
            <div class="rating mt-2">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star text-secondary"></i> <!-- Unfilled star -->
            </div>
        </div>
    </div>

    <ul>
        @if (Auth::user()->user_type === 'employer' || Auth::user()->user_type === 'Recruiter' || Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'Interviewer' || Auth::user()->user_type === 'Talent Acquisition/HR Manager' || Auth::user()->user_type === 'Employee')
            <li><i class="fas fa-tv"></i><a href="{{ route('job.track_application') }}">{{ __('sidebar.dashboard') }}</a></li>

            @if (Auth::user()->user_type === 'Recruiter' || Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'Interviewer' || Auth::user()->user_type === 'Talent Acquisition/HR Manager' || Auth::user()->user_type === 'Employee')
            <li><i class="fas fa-user"></i><a href="{{ route('staff.profile') }}">{{ __('sidebar.profile') }}</a></li>
            @elseif(Auth::user()->user_type === 'employer')
            <li><i class="fas fa-user"></i><a href="{{ route('company.create') }}">{{ __('sidebar.profile') }}</a></li>
            @endif

            <li><i class="bi bi-journal-check"></i><a href="{{ route('myjobs') }}">{{ __('sidebar.jobs') }}</a></li>

            @if (Auth::user()->user_type !== 'employer')
            <li><i class="bi bi-journal-plus"></i><a href="{{ route('myreferrals') }}">{{ __('sidebar.my_referrals') }}</a></li>
            @endif

            @if (Auth::user()->user_type !== 'Employee')
                <li><i class="bi bi-people-fill"></i><a href="{{ route('applicant') }}">{{ __('sidebar.applicants') }}</a></li>
            @endif

            @if(Auth::user()->user_type === 'Recruiter' || Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'Interviewer' || Auth::user()->user_type === 'employer')
                <li><i class="bi bi-person-lines-fill"></i><a href="{{ route('interviews') }}">{{ __('sidebar.interviews') }}</a></li>
            @endif
            @if (Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'employer')
                <li><i class="bi bi-people-fill"></i><a href="{{ route('selection') }}">{{ __('sidebar.selection') }}</a></li>
            @endif
            @if (Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'employer')
                <li><i class="bi bi-people-fill"></i><a href="{{ route('job.onboar') }}">{{ __('sidebar.onboard') }}</a></li>
            @endif
            @if (Auth::user()->user_type === 'employer')
                <li><i class="bi bi-people-fill"></i><a href="{{ route('mystaff') }}">{{ __('sidebar.my_staff') }}</a></li>
            @endif
        @endif
        @if (Auth::user()->user_type === 'seeker')
            <li><i class="fas fa-user"></i><a href="{{ route('user.profile') }}">{{ __('sidebar.profile') }}</a></li>
            <li><i class="fas fa-file-alt"></i><a href="{{ route('user.profile') }}">{{ __('sidebar.resume') }}</a></li>
            <li><i class="fas fa-paperclip"></i><a href="{{ route('user.profile') }}">{{ __('sidebar.cover_letter') }}</a></li>
            <li><i class="fas fa-inbox"></i><a href="{{ route('user.save') }}">{{ __('sidebar.save_job') }}</a></li>
            <li><i class="fas fa-clipboard"></i><a href="{{ route('user.interview') }}">{{ __('sidebar.my_applications') }}</a></li>
        @endif
        @if (Auth::check())
            <li><i class="icon-sign-out"></i><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('sidebar.logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </ul>
</div>

<!-- Edit Image Modal -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel">{{ __('sidebar.update_profile_image') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="avatar" value="avatar">
                        <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">

                        @if ($errors->has('avatar'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('avatar') }}</p>
                            </div>
                        @endif

                        @if (Session::has('avatar'))
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                {{ Session::get('avatar') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">{{ __('sidebar.close') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('sidebar.upload') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
