@extends('layouts.main')
@section('content')

  <div style="height: 94px;"></div>





<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        @if (Session::has('jobmsg'))
        <div class="p-2 bg-white mb-2">
          <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
              <strong>That's Awesome !</strong> {{ Session::get('jobmsg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        </div>

        @endif

        @if (Session::has('error_msg'))
        <div class="p-2 bg-white mb-2">
          <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
              <strong>Error !</strong> {{ Session::get('error_msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        </div>

        @endif

        @if (isset($errors) && count($errors) > 0)
          <div class="p-2 bg-white mb-2">
            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
               <ul>
                @foreach ($errors->all() as  $error)
                  <li>{{ $error }}</li>
                @endforeach
               </ul>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

          </div>
        @endif


      </div>
    </div>
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">



        <div class="p-5 bg-white">

          <div class="mb-4 mb-md-4 mr-5">
           <div class="job-post-item-header d-flex align-items-center">
             <h2 class="mr-3 text-black h4">{{$job->title}}</h2>
             <div class="badge-wrap">
              <span class="border border-peimary text-primary py-2 px-4 rounded">{{Str::ucfirst($job->type)}}</span>
              <!--<span class="border ml-3 bg-primary border-primary text-white py-2 px-4 rounded"><a data-toggle="modal" data-target="#recomend-job-modal" type="button"><i class="icon-envelope-o" style="font-size: 20px;color:#fff"></i></a></span>-->
             </div>
           </div>
           <!--<div class="job-post-item-body d-block d-md-flex">-->
           <!--  <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">Office address:</a></div>-->
           <!--  <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>-->
           <!--</div>-->
          </div>



          <div class=" mb-8 bg-white">
            <!-- icon-book mr-3-->
            <h3 class="h5 text-black mb-3"><i class="icon-library_books" style="color: #9dc0ee;">&nbsp;</i>@lang('job.description') </a></h3>
            <p> {{$job->description}}</p>

          </div>

          <div class=" mb-8 bg-white">
            <!--icon-align-left mr-3-->
            <h3 class="h5 text-black mb-3"><i class="icon-library_books" style="color:#9dc0ee;">&nbsp;</i>@lang('validation.role_and_responsibility')</h3>
            <p>{{$job->roles}} .</p>

          </div>
          <div class=" mb-8 bg-white">
            <!--icon-align-left mr-3-->
            <h3 class="h5 text-black mb-3"><i class="icon-library_books" style="color:#9dc0ee;">&nbsp;</i>@lang('messages.specialization')</h3>
            <p>{{$job->specialization}} .</p>

          </div>
          <div class=" mb-8 bg-white">
            <!--icon-align-left mr-3-->
            <h3 class="h5 text-black mb-3"><i class="icon-library_books" style="color:#9dc0ee;">&nbsp;</i>@lang('validation.department')</h3>
            <p>{{$job->department}} .</p>

          </div>
          <div class=" mb-8 bg-white">
            <h3 class="h5 text-black mb-3"><i class="icon-users" style="color: #9dc0ee;">&nbsp;</i>@lang('job.number_of_vacancy')</h3>
            <p>{{$job->number_of_vacancy }}</p>

          </div>
          <div class=" mb-8 bg-white">
            <h3 class="h5 text-black mb-3"><i class="icon-clock-o" style="color: #9dc0ee;">&nbsp;</i>@lang('message.experience')</h3>
            <p>{{$job->experience}}&nbsp;years</p>

          </div>
          <div class=" mb-8 bg-white">
            <h3 class="h5 text-black mb-3"><i class="icon-genderless" style="color: #9dc0ee;">&nbsp;</i>@lang('job.gender')</h3>
            <p> {{  Str::ucfirst($job->gender)}}</p>

          </div>
          <div class=" mb-8 bg-white">
            <h3 class="h5 text-black mb-3"><i class="icon-money" style="color: #9dc0ee;">&nbsp;</i>@lang('validation.salary')</h3>
            <p>${{$job->salary}}</p>
          </div>



        </div>
      </div>

      <div class="col-lg-4">


        <div class="p-4 mb-3 bg-white">
          <h3 class="h5 text-black mb-3">Short Job Info</h3>
            <p>@lang('job.address') {{$job->address}}</p>
            <p>@lang('job.job_type') {{  Str::ucfirst($job->type)}}</p>
            <p>@lang('job.job_position') {{  Str::ucfirst($job->position)}}</p>
            <p>@lang('validation.specialization') {{  Str::ucfirst($job->specialization)}}</p>
            <p>@lang('validation.department') {{  Str::ucfirst($job->department)}}</p>
            <p>@lang('validation.job_posted') {{$job->created_at->diffForHumans()}}</p>
            <p>@lang('job.last_date') {{ date('F d, Y', strtotime($job->last_date)) }}</p>
<p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn" style="width: 100%; background-color: #55C4CF;">Visit Company Page</a></p>

         @if (Auth::check() && Auth::user()->user_type == 'seeker')
    @if (!$job->checkApplication())
        <form action="{{ route('apply', $job->id) }}" method="POST">
            @csrf
            <p>
            <button type="submit" class="w-100 text-black btn btn-outline-info">@lang('validation.apply_now')</button></p>
        </form>
    @else
        <p>
            <button type="button" class="w-100 text-black btn btn-warning" disabled>@lang('validation.already_applied') </button>
        </p>
    @endif

    <form action="{{ $job->checkSaved() ? route('unsave', $job->id) : route('save', $job->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-success w-100">
           {{ $job->checkSaved() ? __('validation.unsave_job') : __('sidebar.save_job') }}

        </button>
    </form>
@endif

@if (!Auth::check())
    <p>
        <a href="/register" class="btn btn-dark" style="width: 100%;">@lang('validation.for_apply_job_need_login')</a>
    </p>
@endif

          {{-- <p><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p> --}}
        </div>
      </div>
    </div>
  </div>
</div>



@if (count($jobRecommendation) > 0)


  <div class="site-section bg-light pt-0">
    <div class="container">
      <div class="row">

        <div class="col-md-12 block-16" data-aos="fade-up" data-aos-delay="200">
          <div class="d-flex mb-0">
            <h2 class="mb-5 h3 mb-0">Recommended Jobs</h2>
            <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
          </div>

          <div class="nonloop-block-16 owl-carousel">

            @foreach ($jobRecommendation as $recommendJob)


            <div class="border rounded p-4 bg-white">
              <h2 class="h5">{{ $recommendJob->title }}</h2>
              <p><span class="
                border rounded p-1 px-2
                @if($recommendJob->type =='fulltime')
                text-info  border-info
                @elseif($recommendJob->type =='freelance')
                text-warning   border-warning
                @elseif($recommendJob->type =='partime')
                text-danger   border-danger

                @elseif($recommendJob->type =='remote')
                text-dark   border-dark
                @endif

                ">{{Str::ucfirst($recommendJob->type)}}</span></p>
              <p>
                <span class="d-block"><span class="icon-suitcase"></span> {{ Str::limit($recommendJob->position, 30)}}</span>
                <span class="d-block"><span class="icon-room"></span> {{ Str::limit($recommendJob->address, 30)}}</span>
                <span class="d-block"><span class="icon-money mr-1"></span>Salary: ${{$recommendJob->salary}}</span>
              </p>
              <p class="mb-0">{{$recommendJob->roles}}</p>

              <a href="{{ route('job.show', [$recommendJob->id, $recommendJob->slug]) }}"><button class="btn btn-success btn-sm mt-4">Apply this Job</button></a>
            </div>

            @endforeach



          </div>

        </div>
      </div>
    </div>
  </div>

@endif

  <!-- Job Recomend Modal -->
  <div class="modal fade" id="recomend-job-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content pb-4">
        <div class="modal-header mt-2 mb-2">
          <h5 class="modal-title" id="recomend-job-modal">{{ __('Send job to your friend.') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">

              <div class="card-body">
                  <form method="POST" action="{{ route('mail') }}">
                      @csrf

                      <input type="hidden" name="job_id" value="{{ $job->id }}">
                      <input type="hidden" name="job_slug" value="{{ $job->slug }}">
                      <input type="hidden" name="title" value="{{ $job->title }}">
                      <input type="hidden" name="position" value="{{$job->position}}">

                      <div class="row mb-2">
                          <label for="your_name" class="col-md-12 col-form-label text-md-start">{{ __('Your name *') }}</label>

                          <div class="col-md-12">
                              <input id="your_name" type="text" class="form-control @error('your_name') is-invalid @enderror" name="your_name" value="{{ old('your_name') }}"  autocomplete="your_name" autofocus>

                              @error('your_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-2">
                          <label for="your_email" class="col-md-12 col-form-label text-md-start">{{ __('Your email *') }}</label>

                          <div class="col-md-12">
                              <input id="your_email" type="email" class="form-control @error('your_email') is-invalid @enderror" name="your_email" value="{{ old('your_email') }}"  autocomplete="your_email" autofocus>

                              @error('your_email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-2">
                        <label for="friend_name" class="col-md-12 col-form-label text-md-start">{{ __('Your friend name *') }}</label>

                        <div class="col-md-12">
                            <input id="friend_name" type="text" class="form-control @error('friend_name') is-invalid @enderror" name="friend_name" value="{{ old('friend_name') }}"  autocomplete="friend_name" autofocus>

                            @error('friend_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                      <label for="friend_email" class="col-md-12 col-form-label text-md-start">{{ __('Your friend email *') }}</label>

                      <div class="col-md-12">
                          <input id="friend_email" type="email" class="form-control @error('friend_email') is-invalid @enderror" name="friend_email" value="{{ old('friend_email') }}"  autocomplete="friend_email" autofocus>

                          @error('friend_email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                      <div class="row mb-0">
                          <div class="col-md-12 ">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Mail this job') }}
                              </button>


                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
    <!-- Modal -->




@endsection
