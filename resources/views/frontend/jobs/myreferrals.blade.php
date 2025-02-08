@extends('layouts.main')
@include('../frontend/profile/style')
@section('content')


<div style="height: 50px;"></div>


<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
           @include('../frontend/profile/sidebar')
          
                @if (count($referrals) > 0)
 <div class="main-content">
                <div class="card">
                      <div class="d-flex justify-content-between align-items-center mb-4"><h2 class="mb-0"><strong>@lang('sidebar.my_referrals')</strong></h2></div>

                     <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-light" >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('job.job_title')</th>
                                <th scope="col">@lang('message.name')</th>
                                <th scope="col">@lang('message.email')</th>
                                <!--<th scope="col">Gender:</th>-->

                                <!--<th scope="col">Skills:</th>-->
                                <!--<th scope="col">Specialization:</th>-->
                                <!--<th scope="col">Experience:</th>-->

                                <!--<th scope="col">Bio:</th>-->
                                <th scope="col">@lang('sidebar.cover_letter')</th>
                                <th scope="col">@lang('sidebar.resume')</th>
                                <th scope="col">@lang('interviews.interview')</th>
                                <th scope="col">@lang('validation.results')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($referrals as $key => $referral)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    
                                    
                                    <td><a href="{{ route('job.show', [$referral->job_id ?? '', $referral->job->slug ?? '']) }}">{{$referral->job->title ?? '' }}</a></td>
                                    <td>{{$referral->user->name }}</td>
                                    <td>{{$referral->user->email}}</td>
                                    <!--<td>{{$referral->profile->gender}}</td>-->

                                    <!--<td>{{$referral->profile->skills}}</td>-->
                                    <!--<td>{{$referral->profile->specialization}}</td>-->
                                    <!--<td>{{$referral->profile->experience}}</td>-->


                                    @if ($referral->profile->cover_letter)
                                    <td><a class="badge badge-secondary" target="_blank" href="{{ asset($referral->profile->cover_letter) }}">@lang('sidebar.cover_letter')</a></td>

                                    @else
                                    <td>@lang('applicants.not_uploaded')</td>
                                    @endif

                                    @if ($referral->profile->resume)
                                    <td><a class="badge badge-secondary" target="_blank" href="{{ asset($referral->profile->resume) }}">@lang('sidebar.resume')</a></td>

                                    @else
                                    <td>@lang('applicants.not_uploaded')</td>
                                    @endif

                                    <td>
                                        {{$referral->interview->scheduled_at ?? "Not Schedule Yet"}}
                                    </td>
                                    <td>
                                       <a class="badge badge-lg badge-success text-white"> {{$referral->selection->status ?? "Pending"}} </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $referrals->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

</div>
                </div>
                @else

                    <h3 class="text-center">@lang('validation.no_candidate')</h3>

                @endif
            </div>
        </div>
    </div>

</div>

<script>
    function openEditModal(jobid, userid) {
        // const formAction = "{{ route('interview') }}";
        // document.getElementById('interviews').action = formAction;
        document.getElementById('jobsid').value = jobid;
        document.getElementById('usersid').value = userid;



        $('#addCategoryModal').modal('show');
    }

    function toggleUploadMethod(method) {
        document.getElementById('location').classList.toggle('d-none', method !== 'Site');
        document.getElementById('link').classList.toggle('d-none', method !== 'Line');
    }
</script>
@endsection

