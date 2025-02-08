@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 50px;"></div>

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
            @include('../frontend/profile/sidebar')
<div class="main-contents">
            <!-- Main Content -->

                @if($jobs->isEmpty())
                  <div><h1 class="text-center">There are no jobs are created</h1></div>
                @else
                @foreach($jobs as $job)
                <div class="job-card">
                    <div class="job-header">
                        <h2>{{ $job->title }}</h2>
                        <div class="job-stats">
                          <div class="stat">
    <h3 style="color: #007bff;">{{ $job->applicant }}</h3>
    <p style="color: #007bff;"><i class="fas fa-inbox" style="color: #007bff;"></i> @lang('applicants.applicants')</p>
</div>
<div class="stat">
    <h3 style="color: #28a745;">{{ $job->shortlisted }}</h3>
    <p style="color: #28a745;"><i class="fas fa-check-circle" style="color: #28a745;"></i> @lang('applicants.shortlisted')</p>
</div>
<div class="stat">
    <h3 style="color: #ffc107;">{{ $job->interview }}</h3>
    <p style="color: #ffc107;"><i class="fas fa-user-check" style="color: #ffc107;"></i> @lang('interviews.interview')</p>
</div>
<div class="stat">
    <h3 style="color: #dc3545;">{{ $job->selected }}</h3>
    <p style="color: #dc3545;"><i class="fas fa-users" style="color: #dc3545;"></i> @lang('sidebar.selection')</p>
</div>
</div>
                    </div>
                <div class="job-footer" style="font-size: 14px;">
    @if($job->status == 0)
    <span class="status close" style="font-size: 13px;"><i class="fas fa-circle"></i> @lang('job.draft')</span>
    @else
    <span class="status open" style="font-size: 13px;"><i class="fas fa-circle"></i> @lang('job.active')</span>
    @endif

    @php
        $currentDate = \Carbon\Carbon::now();
        $lastDate = \Carbon\Carbon::parse($job->last_date);
        $daysRemaining = $lastDate->diffInDays($currentDate, false);
    @endphp

    @if($daysRemaining > 0)
    <span style="font-size: 13px;"><i class="fas fa-hourglass-half"></i> @lang('validation.expire') {{ $daysRemaining }} days</span>
    @else
    <span style="font-size: 13px;"><i class="fas fa-hourglass-half"></i> @lang('validation.expired') {{ abs($daysRemaining) }} days ago</span>
    @endif

    <span style="font-size: 13px;"><i class="fas fa-clock"></i> @lang('applicants.create') {{ $job->created_at->diffForHumans() }}</span>
    <span style="font-size: 13px;"><i class="fas fa-map-marker-alt"></i> {{ $job->company->address }}</span>
</div>

                </div>

                @endforeach
                    <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $jobs->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
