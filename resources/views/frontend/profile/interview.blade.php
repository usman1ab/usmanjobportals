@extends('layouts.main')

@include('../frontend/profile/style')

@section('content')
<div style="height: 95px;"></div>

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
           @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <h2 class=""><strong>{{ __('messages.applications_interviews') }}</strong></h2>
             <div class="row justify-content-center">
      <div class="col-md-12">
        @if ($applications->isEmpty())
          <h3 class="text-center">{{ __('messages.no_application_found') }}</h3>
        @else
          @foreach ($applications as $application)
            <div class="card mb-4 shadow-sm">
              <div class="card-header text-white" style="background-color: #55C4CF;">
                <h5 class="mb-0">{{ __('messages.job_title') }}:
                  <a href="{{ route('job.show', [$application->job->id, $application->job->slug]) }}" class="text-white">
                    {{ $application->job->title }}
                  </a>
                </h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <h6 class="text-muted">{{ __('messages.interview_details') }}:</h6>
                    @if ($application->interview)
                    <p>
                      <strong>{{ __('messages.date_time') }}:</strong> {{ $application->interview->scheduled_at->format('Y-m-d h:i A') }} <br>
                      <strong>{{ __('messages.type') }}:</strong>
                      @if ($application->interview->location)
                         {{ __('messages.onsite') }} <br>
                        <strong>{{ __('messages.location') }}:</strong> {{ $application->interview->location }} <br>
                      @elseif ($application->interview->link)
                        {{ __('messages.online') }} <br>

                      <strong>{{ __('messages.link') }}:</strong> <a href="{{ $application->interview->link }}" target="_blank">{{ $application->interview->link }}</a> <br>
                      @else
                        {{ __('messages.not_specified') }}
                      @endif
                      @if(empty( $application->selection->offer))
                      <strong>{{ __('messages.offer') }}:</strong> {{ __('messages.no_offer_yet') }} <br>
                      @else
                       <strong>{{ __('messages.offer') }}:</strong> <a href="{{ asset('uploads/avatar') }}/{{ $application->selection->offer }}" class="badge badg-dark">{{ __('messages.view') }}</a> <br>
                      @endif
                    </p>
                    @else
                        <strong>{{ __('messages.not_scheduled_yet') }}</strong>
                    @endif
                    <p>
                        <strong>{{ __('messages.status') }}:</strong> <span class="badge badge-danger">{{ $application->selection->status ?? __('messages.pending') }}</span>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <h6 class="text-muted">{{ __('messages.job_details') }}:</h6>
                    <p>
                      <strong>{{ __('messages.position') }}:</strong> {{ $application->job->position }} <br>
                      <strong>{{ __('messages.description') }}:</strong> {{ Str::limit($application->job->description, 100) }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ route('job.show', [$application->job->id, $application->job->slug]) }}" class="btn btn-sm" style="background-color: #55C4CF;">
                  {{ __('messages.view_job') }}
                </a>
                <span class="text-muted"><a href="{{route('job.reschedule',  $application->job->id)}}" class="btn" style="background-color: #55C4CF;">{{ __('messages.reschedule_interview') }}</a></span>
              </div>
            </div>
          @endforeach
                @php
                              $count = $applications->count();
                        @endphp
                              @if($count > 3)
                             <div class="d-flex justify-content-center">
                     {{ $applications->links('pagination::bootstrap-4') }}
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
