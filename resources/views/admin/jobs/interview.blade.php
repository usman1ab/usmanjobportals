@extends('../admin/layouts.app')

@section('content')
       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('interviews.home')</a></li>

            <li class="breadcrumb-item active" aria-current="page">@lang('interviews.interview')</li>
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
                                    <th>@lang('interviews.sl')</th>
                                    <th>@lang('interviews.job_title')</th>
                                    <th>Company</th>
                                    
                                    <!--<th>@lang('interviews.job_expiry_date')</th>-->
                                    <th>@lang('interviews.applicant_name')</th>
                                    <th>@lang('interviews.email')</th>
                                    <th>@lang('interviews.resume')</th>
                                    <th>@lang('interviews.cover_letter')</th>
                                    <th>@lang('interviews.interview_id')</th>
                                    <!--<th>@lang('interviews.interview_status')</th>-->
                                    
                                    <th>@lang('interviews.date')</th>
                                    <th>@lang('interviews.time')</th>
                                    <th>@lang('interviews.link')</th>
                                    <th>@lang('interviews.location')</th>
                                    <th>Feedback</th>
                                    <!--<th>@lang('interviews.recruiter_score')</th>-->
                                    <!--<th>@lang('interviews.hr_score')</th>-->
                                    <!--<th>@lang('interviews.interviewer_score')</th>-->
                                    <!--<th>@lang('interviews.reschedule')</th>-->
                                    <th>@lang('interviews.status')</th>
                                    <th>@lang('interviews.action')</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i=0; ?>
                               @foreach ($interview as $data)
                                <?php $i++ ?>


                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $data->job->title }}</td>
                                           <td>{{ $data->job->company->cname }}</td>
                                        <!--<td> <span class="badge badge-lg badge-warning text-black">{{ date('F d, Y', strtotime($data->job->last_date)) }}</span></td>-->
                                        <td> <span class="badge badge-lg badge-warning text-secondary">{{ $data->user->name }}</span></td>
                                        <td> <span class="badge badge-lg badge-white text-black">{{ $data->user->email }}</span></td>
                                              <!-- Resume -->
                                        <td>
                                          @if ($data->user->profile && $data->user->profile->resume)
                                            <a class="badge badge-secondary" target="_blank" href="{{ asset($data->user->profile->resume) }}">
                                             @lang('interviews.resume')
                                            </a>
                                          @else
                                            @lang('interviews.not_uploaded')
                                          @endif
                                        </td> <!-- cover latter -->
                                        <td>
                                          @if ($data->user->profile && $data->user->profile->resume)
                                            <a class="badge badge-secondary" target="_blank" href="{{ asset($data->user->profile->resume) }}">
                                             @lang('interviews.resume')
                                            </a>
                                          @else
                                            @lang('interviews.not_uploaded')
                                          @endif
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <!--<td> <a class="badge badge-lg badge-secondary text-white" href="{{ route('interviewtoggle', ['id' => $data->id, 'name' => $data->status]) }}">{{ $data->status }}</a></td>-->
                                        
                                        <td>{{ $data->scheduled_at->format('Y-m-d') }}</td>
                                        <td>{{ $data->scheduled_at->format('h:i A') }}</td>
                                        
                                        <td>{{ $data->link ?? __('interviews.on_site') }}</td>
                                        <td>{{ $data->location ?? __('interviews.online') }}</td>
                                        
                                        <!--@if(empty($data->link))-->
                                        <!--    <td>{{ $data->location ?? '' }}</td>-->
                                            <!--<td class="badge badge-lg badge-secondary-emphasis text-black text-center mt-2">@lang('interviews.on_site')</td>-->
                                        <!--@else-->
                                        <!--    <td>{{ $data->link ?? '' }}</td>-->
                                        <!--@endif-->
                                        
                                        <!--@if(empty($data->location))-->
                                        <!--<td class="badge badge-lg badge-secondary-emphasis text-black text-center">@lang('interviews.online')</td>-->
                                        <!--@else-->
                                        <!--<td>{{ $data->location ?? '' }}</td>-->
                                        <!--@endif-->
                                        
                                        
                                        <td><a href="{{route('feedbacks',[$data->id])}}" class="btn btn-info">View Feedback</a></td>

                                        <td>
                                          @if ($data->score === null)
                                            <span class="badge badge-lg badge-warning text-black">@lang('interviews.pending')</span>
                                          @elseif($data->score->status === 'selected')
                                            <span class="badge badge-lg badge-success text-black">{{ $data->score->status }}</span>
                                          @elseif($data->score->status === 'rejected')
                                            <span class="badge badge-lg badge-danger text-black">{{ $data->score->status }}</span>
                                          @endif
                                          
                                        </td>
                                        <!--Action-->
                                        <td style="width: 18%">
                                            <a class="btn btn-sm btn-secondary" href="{{route('adminShow',[$data->job->id])}}"><i class="material-icons">remove_red_eye</i> </a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#jobDelete-{{ $data->id }}" type="button"><i class="material-icons">delete</i></button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="jobDelete-{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $data->id }}">{{ $data->job->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4>@lang('interviews.delete_interview')</h4>
                                                    </div>
                                                    <form action="{{ route('deleteInterview') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('interviews.cancel')</button>
                                                            <button type="submit" class="btn btn-danger">@lang('interviews.delete')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                @endforeach

                        </table>
                      </div>
                    </div>
                </div>
            </div>

        </div>

         <!-- Users DataTable-->
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">@lang('interviews.update_interview')</h5>

            </div>
            <div class="modal-body">
              <form id="intervie" method="POST" action="">
    @csrf
    <div class="mb-3">
        <label for="scheduled" class="form-label">@lang('interviews.interview_date_time')</label>
        <input type="datetime-local" class="form-control" id="scheduled" name="scheduled" required>
    </div>

    <div class="form-group">
        <label style="margin-right: 5px;">@lang('interviews.interview_type') : </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="upload_method" id="OnSite" value="Site" checked onclick="toggleUploadMethod('Site')">
            <label class="form-check-label" for="OnSite">@lang('interviews.on_site')</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="upload_method" id="OnLine" value="Line" onclick="toggleUploadMethod('Line')">
            <label class="form-check-label" for="OnLine">@lang('interviews.online')</label>
        </div>
    </div>

    <div class="mb-3" id="location">
        <label for="location" class="form-label">@lang('interviews.location')</label>
        <input type="text" id="location" class="form-control" name="location" placeholder="@lang('interviews.enter_interview_location')">
    </div>
    <div class="mb-3 d-none" id="link">
        <label for="Link" class="form-label">@lang('interviews.link')</label>
        <input type="text" class="form-control" name="link" placeholder="@lang('interviews.enter_interview_link')">
    </div>

    <div class="mb-3">
        <label for="notes" class="form-label">@lang('interviews.additional_notes')</label>
        <textarea class="form-control" id="note" name="notes" rows="3" placeholder="@lang('interviews.enter_notes')"></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">@lang('interviews.schedule_interview')</button>
    </div>
</form>

            </div>

        </div>
    </div>
</div>


<script>

function rescheduleInterview(id, time, location, link, note) {
    // Show the modal
    $('#addModal').modal('show');

    // Pre-fill form fields
    document.getElementById('scheduled').value = time; // Populate the date-time
    document.getElementById('note').value = note;      // Populate the notes

    // Toggle fields based on the type (OnSite or Online)
    if (location !== "empty") {
        document.getElementById('OnSite').checked = true;
        toggleUploadMethod('Site');
        document.getElementById('location').querySelector('input').value = location;
    } else {
        document.getElementById('OnLine').checked = true;
        toggleUploadMethod('Line');
        document.getElementById('link').querySelector('input').value = link;
    }

    // Update the form's action URL with the interview ID
     const formAction = "{{ route('admin.reschedule', ':id') }}".replace(':id', id);
    document.getElementById('intervie').action = formAction;
}

function toggleUploadMethod(method) {
    if (method === 'Site') {
        document.getElementById('location').classList.remove('d-none');
        document.getElementById('link').classList.add('d-none');
    } else {
        document.getElementById('location').classList.add('d-none');
        document.getElementById('link').classList.remove('d-none');
    }
}

</script>

@endsection
