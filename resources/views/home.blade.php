@extends('layouts.main')

@include('../frontend/profile/style')

@section('content')
<div style="height: 95px;"></div>
{{-- <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }})">
    <div class="container text-center">
        <h1 class="mb-0" style="color: #fff; font-size: 2.5rem;">Profile</h1>
        <p class="mb-0 unit-6">
            <a href="/">Home</a> <span class="sep"> > </span>
            <a href="{{ route('alljobs') }}">Jobs</a> <span class="sep"> > </span>
            {{ auth()->check() ? auth()->user()->name : 'Guest' }}
        </p>
    </div>
</div> --}}

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
           @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <h2 class=""><strong>@lang('sidebar.save_job')</strong></h2>
                <div class="row justify-content-center">
                    <div class="col-14 col-md-12">
                        @if (Auth::user()->user_type == 'seeker')
                            @if ($jobs->isEmpty())
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="mb-0">No job listings available at the moment</p>
                                    </div>
                                </div>
                            @else
                                @foreach ($jobs as $job)
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-header text-white" style="background-color: #55C4CF;">
                                            <h5 class="mb-0">@lang('job.job_title') : {{ $job->title }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <small class="badge bg-secondary mb-2">@lang('job.job_position') {{ $job->position }}</small>
                                            <p class="text-muted">@lang('job.description') {{ Str::limit($job->description, 150, '...') }}</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between align-items-center">
                                            <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="btn btn-sm" style="background-color: #55C4CF;">View Job</a>
                                            <span class="text-muted small">@lang('job.last_date') {{ $job->last_date }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                @php
                                $count = $jobs->count();
                                @endphp
                                @if($count > 3)
                               <div class="d-flex justify-content-center">
                        {{ $jobs->links('pagination::bootstrap-4') }}
                    </div>
                    @endif
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('../frontend/profile/footer')
@endsection
