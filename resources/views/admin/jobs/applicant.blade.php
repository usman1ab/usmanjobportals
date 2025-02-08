@extends('../admin/layouts.app')

@section('content')
    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('applicants.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('applicants.applicants')</li>
            </ol>
        </nav>
    </div>
    <!--  Header BreadCrumb -->

    <!-- Users DataTable-->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-body mt-3">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>@lang('applicants.job_title')</th>
                                    <th>Company</th>
                                    <!--<th>@lang('applicants.job_expiry_date')</th>-->
                                    <th>@lang('applicants.applicant_name')</th>
                                    <th>@lang('applicants.email')</th>
                                    <th>@lang('applicants.resume')</th>
                                    <th>@lang('applicants.cover_letter')</th>
                                    <th>@lang('applicants.interview')</th>
                                    <th>@lang('applicants.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $applicant)
                                    <?php $i=0; ?>
                                    @foreach ($applicant->users as $user)
                                        <?php $i++ ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><a class="text-dark" href="{{route('adminShow',[$applicant->id])}}">{{ $applicant->title }}</a></td>
                                            <td><a class="text-dark" href="{{route('adminShow',[$applicant->id])}}">{{ $applicant->company->cname }}</a></td>
                                            <!--<td>-->
                                            <!--    <span class="badge badge-lg badge-info text-white">{{ date('F d, Y', strtotime($applicant->last_date)) }}</span>-->
                                            <!--</td>-->
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>

                                            @if ($user->profile->resume)
                                                <td><a class="badge badge-secondary" target="_blank" href="{{ asset($user->profile->resume) }}">@lang('applicants.resume')</a></td>
                                            @else
                                                <td>@lang('applicants.not_uploaded')</td>
                                            @endif
                                            @if ($user->profile->cover_letter)
                                                <td><a class="badge badge-info" target="_blank" href="{{ asset($user->profile->cover_letter) }}">@lang('applicants.cover_letter')</a></td>
                                            @else
                                                <td>@lang('applicants.not_uploaded')</td>
                                            @endif

                                            <td>
                                                @php
                                                    $job = $applicant->id;
                                                    $user = $user->id;
                                                    $data =  $applicant->checkInterview($user);
                                                @endphp
                                                @if (!$data && Auth::user()->user_type==='admin' )
                                                <!--    <button type="button" class="btn btn-primary" onclick="openEditModal('{{$job}}','{{$user}}')">@lang('applicants.create')</button>-->
                                                    @lang('applicants.not_scheduled')
                                                @else
                                                    {{$data->scheduled_at ?? __("applicants.not_scheduled")}}
                                                @endif
                                            </td>
                                            <td style="width: 18%">
                                                <a class="btn btn-sm btn-secondary" href="{{route('adminShow',[$applicant->id])}}"><i class="material-icons">remove_red_eye</i>  </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users DataTable-->

    <!-- Modal for Adding Interview Detail -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">@lang('applicants.add_interview_detail')</h5>
                </div>
                <div class="modal-body">
                    <form id="interviews" method="POST" action="{{route('intervie')}}">
                        @csrf
                        <input type="hidden" id="jobsid" name="job_id" value="">
                        <input type="hidden" id="usersid" name="user_id" value="">

                        <div class="mb-3">
                            <label for="scheduled_at" class="form-label">@lang('applicants.interview_date_time')</label>
                            <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" required>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 5px;">@lang('applicants.interview_type') : </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="upload_method" id="OnSite" value="Site" checked onclick="toggleUploadMethod('Site')">
                                <label class="form-check-label" for="uploadSingle">@lang('applicants.on_site')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="upload_method" id="OnLine" value="Line" onclick="toggleUploadMethod('Line')">
                                <label class="form-check-label" for="uploadCSV">@lang('applicants.online')</label>
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
                            <button type="submit" class="btn btn-primary">@lang('applicants.schedule_interview')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
    </script>

@endsection
