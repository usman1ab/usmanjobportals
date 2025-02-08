@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 50px;"></div>

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            @include('../frontend/profile/sidebar')
               <div class="main-contents">
                <h2 class="text-center"><strong>@lang('applicants.applicants')</strong></h2>

                    @if (count($applicants) > 0)
                    @foreach ($applicants as $applicant)
                        @foreach ($applicant->users as $user)
                         @php
        $job = $applicant->id;
        $user_id = $user->id;
        $data = $applicant->checkInterview($user_id);
    @endphp

             <div class="job-cards position-relative">
    <!-- Top-left Buttons -->
     <div class="top-buttons position-absolute" style="top: 10px; right: 10px;">
       @if ($user->profile->resume)
                                <a href="{{ asset($user->profile->resume) }}" class="btn btn-gradient-dark btn-sm mb-2 mr-2">
                                    <i class="bi bi-file-text"></i> @lang('applicants.resume')
                                </a>
                            @else
                                <a href="{{ asset($user->profile->resume) }}" class="btn btn-gradient-dark btn-sm mb-2 mr-2">
                                    <i class="bi bi-file-text"></i> @lang('applicants.not_uploaded')
                                </a>
                            @endif
          @if(!$data && (Auth::user()->user_type === 'employer' || Auth::user()->user_type === 'Recruiter'))
        <a  onclick="openEditModal('{{ $job }}', '{{ $user_id }}')" class="btn btn-secondary btn-sm mb-2">@lang('applicants.schedule_interview')</a>
        @else<a href="" class="btn btn-secondary btn-sm mb-2">
    <i class="bi bi-clock"></i>
    @if(empty($data->scheduled_at))
    @lang('applicants.not_scheduled')
    @else
    {{ $data->scheduled_at ? \Carbon\Carbon::parse($data->scheduled_at)->format('y-m-d') : "Not Scheduled" }}
    @endif
</a>

        @endif
    </div>

    <!-- Profile Picture -->
    <div class="profile-picture">
        @if (!empty($user->profile->avatar))
            <img src="{{ asset('uploads/avatar') }}/{{$user->profile->avatar}}" alt="Profile Picture">
        @else
            <img src="https://i.pravatar.cc/150" alt="profile image" class="img-fluid rounded-circle">
        @endif
    </div>

    <!-- User Details -->
    <div class="user-details">
        <h2>{{$user->name}}</h2>
        <p>{{$user->email}}</p>
        <p class="job-title">{{$applicant->title}}</p>
    </div>



    <!-- Status Icons -->
    <div class="status-icons">
        @if(!empty($data))
            <div class="icon-wrapper shortlisted">
                <i class="bi bi-check-circle-fill"></i>
                <span>@lang('applicants.shortlisted')</span>
            </div>
        @endif
        @if(!empty($user->selection))
            <div class="icon-wrapper interview">
                <i class="bi bi-person-lines-fill"></i>
                <span>@lang('applicants.interview')</span>
            </div>
            <div class="icon-wrapper selection">
                <i class="bi bi-award-fill"></i>
                <span>{{$user->selection->status}}</span>
            </div>
        @endif
    </div>
</div>

                        @endforeach
                    @endforeach
                    <div class="pagination-wrapper">
                        {{ $applicants->links('pagination::bootstrap-4') }}
                    </div>
                    @else
                        <h3 class="text-center">No Applicants Found!.</h3>
                    @endif

                </div>

        </div>
    </div>
</div>




<!-- Interview Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">@lang('applicants.interview_details')</h5>
            </div>
            <div class="modal-body">
                <form id="interviews" method="POST" action="{{ route('interview') }}">
                    @csrf
                    <input type="hidden" id="jobsid" name="job_id" value="">
                    <input type="hidden" id="usersid" name="user_id" value="">

                    <div class="mb-3">
                        <label for="scheduled_at" class="form-label">@lang('applicants.interview_date_time')</label>
                        <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" required>
                    </div>
                    <div class="form-group">
                        <label>@lang('applicants.interview_type')</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="upload_method" id="OnSite" value="Site" checked onclick="toggleUploadMethod('Site')">
                            <label class="form-check-label" for="OnSite">@lang('applicants.onsite')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="upload_method" id="OnLine" value="Line" onclick="toggleUploadMethod('Line')">
                            <label class="form-check-label" for="OnLine">@lang('applicants.online')</label>
                        </div>
                    </div>
                    <div class="mb-3" id="location">
                        <label for="location" class="form-label">@lang('applicants.location')</label>
                        <input type="text" class="form-control" name="location" placeholder="@lang('applicants.enter_location')">
                    </div>
                    <div class="mb-3 d-none" id="link">
                        <label for="Link" class="form-label">@lang('applicants.link')</label>
                        <input type="text" class="form-control" name="link" placeholder="@lang('applicants.enter_link')">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">@lang('applicants.additional_notes')</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="@lang('applicants.enter_notes')"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('applicants.schedule_interview_button')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script>
    function openEditModal(jobid, userid) {
        document.getElementById('jobsid').value = jobid;
        document.getElementById('usersid').value = userid;
        $('#addCategoryModal').modal('show');
    }

    function toggleUploadMethod(method) {
        document.getElementById('location').classList.toggle('d-none', method !== 'Site');
        document.getElementById('link').classList.toggle('d-none', method !== 'Line');
    }

    $(document).ready(function() {
        $('#applicantsTable').DataTable({
            responsive: true,
            autoWidth: false,
            columnDefs: [
                { orderable: false, targets: [8, 9, 10] }
            ]
        });
    });
</script>
@endsection
