@extends('../admin/layouts.app')

@section('content')
    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('job.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
            </ol>
        </nav>
        <div class="create-item">
            <a href="{{ route('intervi') }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;@lang('Back to Interviews')</a>
        </div>
    </div>
    <!--  Header BreadCrumb -->

    <div class="card bg-white">
        <div class="card-body mt-1 mb-5">
            <div class="main-content">
                <div class="row justify-content-center">
                    <div class="align-items-center justify-content-center mb-4">
                        <h2 class="mb-0"><strong>Feedbacks</strong></h2>
                    </div>
                </div>
                
                @if($data->isEmpty())
                    <!--<p>No feedbacks available.</p>-->
                    <div class="row justify-content-center">
                    <div class="align-items-center justify-content-center mb-4">
                        <h6 class="mb-0"><strong>No feedbacks available.</strong></h6>
                    </div>
                </div>
                @else
                    @foreach ($data as $datas)
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6" style="border-right: 1px solid gainsboro;">
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-user"></i> Applicant Name:</span>
                                <span>{{ $datas->user_name ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-briefcase"></i> Job Title:</span>
                                <span>{{ $datas->job ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-user-tie"></i> Interviewer Name:</span>
                                <span>{{ $datas->employee ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-user-tie"></i> Interviewer Position:</span>
                                <span>{{ $datas->employee_type ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-calendar-alt"></i> Interview Date:</span>
                                <span>{{ $datas->interview->scheduled_at ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-map-marker-alt"></i> Interview Type:</span>
                                @if(empty($datas->interview->location))
                                <span>Online</span>
                                @else
                                <span>OnSite</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Technical Knowledge and Expertise:</span>
                                <span>{{ $datas->q1 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Problem Solving:</span>
                                <span>{{ $datas->q2 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Interpersonal Skill:</span>
                                <span>{{ $datas->q3 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Motivation and Adaptability:</span>
                                <span>{{ $datas->q4 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Leadership Skill:</span>
                                <span>{{ $datas->q5 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Strategic Planning & Development:</span>
                                <span>{{ $datas->q6 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Team Management:</span>
                                <span>{{ $datas->q7 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-star"></i> Delegation of Work:</span>
                                <span>{{ $datas->q8 ?? "-" }}</span>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <span><i class="fas fa-user-check"></i> Appearance:</span>
                                <span>{{ $datas->q9 ?? "-" }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <h2 style="margin-top: 5px">Recommendation:</h2>
                    <div class="skills">
                        @if($datas->recommend == '1')
                        <div class="skill text-success">I recommend to hire this candidate.</div>
                        @else
                        <div class="skill text-danger">I does not recommend hiring this candidate.</div>
                        @endif
                    </div>
                    <hr>
                    @endforeach
                @endif

                <!-- Pagination -->
                <div class="pagination justify-content-center mt-4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
