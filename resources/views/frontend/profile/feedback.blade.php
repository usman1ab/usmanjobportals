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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>{{ __('messages.feedbacks') }}</strong></h2>
                </div>

                @if($data->isEmpty())
                    <p>{{ __('messages.no_feedbacks') }}</p>
                @else
                    @foreach ($data as $datas)
                    <div class="info-item">
                        <span><i class="fas fa-user"></i> {{ __('messages.applicant') }}</span>
                        <span>{{ $datas->user_name ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-briefcase"></i> {{ __('messages.job') }}</span>
                        <span>{{ $datas->job ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-user-tie"></i> {{ __('messages.interviewer_name') }}</span>
                        <span>{{ $datas->employee ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-user-tie"></i> {{ __('messages.interviewer_type') }}</span>
                        <span>{{ $datas->employee_type ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-calendar-alt"></i> {{ __('messages.interview_date') }}</span>
                        <span>{{ $datas->interview->scheduled_at ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-map-marker-alt"></i> {{ __('messages.interview_type') }}</span>
                        @if(empty($datas->interview->location))
                            <span>{{ __('messages.online') }}</span>
                        @else
                            <span>{{ __('messages.onsite') }}</span>
                        @endif
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.technical_knowledge') }}</span>
                        <span>{{ $datas->q1 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.problem_solving') }}</span>
                        <span>{{ $datas->q2 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.interpersonal_skill') }}</span>
                        <span>{{ $datas->q3 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.motivation_adaptability') }}</span>
                        <span>{{ $datas->q4 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.leadership_skill') }}</span>
                        <span>{{ $datas->q5 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.strategic_planning') }}</span>
                        <span>{{ $datas->q6 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.team_management') }}</span>
                        <span>{{ $datas->q7 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-star"></i> {{ __('messages.delegation_of_work') }}</span>
                        <span>{{ $datas->q8 ?? "-" }}</span>
                    </div>
                    <div class="info-item">
                        <span><i class="fas fa-user-check"></i> {{ __('messages.appearance') }}</span>
                        <span>{{ $datas->q9 ?? "-" }}</span>
                    </div>
                    <h2 style="margin-top: 5px">{{ __('messages.recommendation') }}</h2>
                    <div class="skills">
                        @if($datas->recommend == '1')
                            <div class="skill text-success">{{ __('messages.recommend_hire') }}</div>
                        @else
                            <div class="skill text-danger">{{ __('messages.not_recommend_hire') }}</div>
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
</div>
@endsection
