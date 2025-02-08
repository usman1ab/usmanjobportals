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
                <h2 class=""><strong>Interview</strong></h2>
             <div class="row justify-content-center">
      <div class="col-md-12">
        @if ($interviews->isEmpty())
          <h3 class="text-center">No interviews scheduled yet.</h3>
        @else
          @foreach ($interviews as $interview)
            <div class="card mb-4 shadow-sm">
              <div class="card-header bg-info text-white">
                <h5 class="mb-0">Job Title:
                  <a href="{{ route('job.show', [$interview->job->id, $interview->job->slug]) }}" class="text-white">
                    {{ $interview->job->title }}
                  </a>
                </h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <h6 class="text-muted">Interview Details:</h6>
                    <p>
                      <strong>Date & Time:</strong> {{ $interview->scheduled_at->format('Y-m-d h:i A') }} <br>
                      <strong>Type:</strong>
                      @if ($interview->location)
                         Onsite <br>
                        <strong>Location :</strong>   {{ $interview->location }} <br>
                      @elseif ($interview->link)
                        Online <br>

                      <strong>Link :</strong> <a href="{{ $interview->link }}" target="_blank">{{ $interview->link }}</a> <br>
                      @else
                        Not specified
                      @endif
                    </p>
                  </div>
                  <div class="col-md-6">
                    <h6 class="text-muted">Job Details:</h6>
                    <p>
                      <strong>Position:</strong> {{ $interview->job->position }} <br>
                      <strong>Description:</strong> {{ Str::limit($interview->job->description, 100) }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ route('job.show', [$interview->job->id, $interview->job->slug]) }}" class="btn btn-sm btn-info">
                  View Job
                </a>
                <span class="text-muted"><a href="" class="btn btn-info">Reschedule Interview</a></span>
              </div>
            </div>
          @endforeach
                <@php
                              $count = $interviews->count();
                        @endphp
                              @if($count > 3)
                             <div class="d-flex justify-content-center">
                     {{ $interviews->links('pagination::bootstrap-4') }}
                  </div>
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
