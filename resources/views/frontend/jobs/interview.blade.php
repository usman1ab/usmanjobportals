@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 50px;"></div>

<div class="site-section bg-light ml-2">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
            @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <!--<h2><strong>All Recent Jobs</strong></h2>-->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>@lang('interviews.interview')</strong></h2>
                
                </div>

                <!-- Responsive Table -->
                <div class="table-responsive">
                   @if (count($interview) > 0)
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('applicants.applicants')</th>
                                <th scope="col">@lang('job.jobs')</th>
                                <th scope="col">@lang('messages.location')</th>
                                 <th scope="col">@lang('messages.link')</th>
                                <th scope="col">@lang('messages.date_time')</th>
                                 <th>@lang('interviews.feedback')</th>
                                <th scope="col">@lang('job.status')</th>
                                <th scope="col">@lang('job.action')</th>
                            </tr>
                        </thead>
                        <tbody>

                                 @foreach ($interview as $key => $data)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $data->user->name  }}</td>
                                    <td>{{ $data->job->title }}</td>
                                     @if(empty($data->location))
                                  <td>online</td>
                                  @else
                                   <td style="width: 6%;">{{$data->location}}</td>
                                   @endif
                                @if(empty($data->link))
                                  <td>onsite</td>
                                  @else
                                   <td style="width: 6%;">      <a href="{{ $data->link }}" target="_blank" class="text-truncate d-block" style="max-width: 150px;">
                                    {{ $data->link }}
                                </a></td>
                                   @endif
                                 
                                     
                                <td>{{ $data->scheduled_at->format('Y-m-d') }} {{ $data->scheduled_at->format('h:i A') }}</td>
                                  <td>
                                    @if (Auth::user()->user_type==='Interviewer' || Auth::user()->user_type==='Hiring Manager' || Auth::user()->user_type==='employer')
                                    <button class="btn btn-gradient-info mb-2" onclick="openEditModal('{{ $data->id }}','{{$data->user_id}}','{{$data->job_id}}')">@lang('interviews.feedback')</button>
                                   @endif
                                    <a href="{{route('feedbackss',$data->id)}}" class="btn btn-gradient-success"> <i class="fas fa-eye"></i>@lang('messages.view')</a>
                                  </td>
                                   <td>
                              @if ($data->score === null)
                                @lang('interviews.pending')
                              @else
                                {{ $data->score->status }}
                              @endif
                            </td>
                            <td>
                                <a href="{{ route('job.show', [$data->job->id, $data->job->slug]) }}" class="text-success mx-2" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
 @php
if (empty($data->link))
{
    $link = 'empty';
}else {
    $link = $data->link;
}
if (empty($data->location))
{
    $location = 'empty';
}else {
    $location = $data->location;
}
@endphp
                               @if (Auth::user()->user_type === 'Recruiter')
                                <a  onclick="rescheduleInterview('{{ $data->id }}','{{$data->scheduled_at}}','{{$location  }}','{{ $link  }}','{{$data->notes}}')" class="text-secondary mx-2" title="Edit" type="button">
                                            <i class="fas fa-edit"></i> </a>

                                @endif
                            </td>
                                </tr>

                                @endforeach

                        </tbody>

                    </table>
                    <div class="pagination-wrapper">
                     {{ $interview->links('pagination::bootstrap-4') }}
                    </div>
                    @else
                        <h3 class="text-center">No Interview Found!.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Feedback Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="addCategoryModalLabel">@lang('validation.give_score')</h5>
   </div>
      <div class="modal-body">

{{-- <h1>Give Score Out of 10</h1> --}}

                    {{-- <p>Unsatisfactory(0)  Some deficiencies(2.5)</p>
                    <p>Satisfactory(5)  Excellent(7.5)  OutStanding(10)</p> --}}



        <form id="interviews" method="POST" action="{{route('feedback')}}">
          @csrf
          <input type="hidden" id="usertype" name="user_type" value="{{ Auth::user()->user_type }}">
          <input type="hidden" id="usersid" name="user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" id="interviewid" name="interviewid" value="">
          <input type="hidden" id="user" name="user" value="">
          <input type="hidden" id="jobs" name="job" value="">
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.technical_knowledge')</label>
            <input type="number" class="form-control" id="score" name="q1" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.problem_solving')</label>
            <input type="number" class="form-control" id="q2" name="q2" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.interpersonal_skill')</label>
            <input type="number" class="form-control" id="q3" name="q3" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.motivation_adaptability')</label>
            <input type="number" class="form-control" id="q4" name="q4" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.leadership_skill')</label>
            <input type="number" class="form-control" id="q5" name="q5" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('validation.Strategic Planning & Development')</label>
            <input type="number" class="form-control" id="q6" name="q6" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.team_management')</label>
            <input type="number" class="form-control" id="q7" name="q7" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.delegation_of_work')</label>
            <input type="number" class="form-control" id="q8" name="q8" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label">@lang('messages.appearance')</label>
            <input type="number" class="form-control" id="q9" name="q9" required>
          </div>
          <div class="row" id="radio_typ" >
            <div class="form-group col-md-12 col-sm-12 d-flex align-items-center">
                <label class="form-check-label me-3" id="mylabele">
                    @lang('validation.Do you recommend to hire?')
                </label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input ml-2" name="radio_typ" id="radio_typ" value="1">
                    <label class="form-check-label" for="radio_type_yes">   @lang('validation.Yes')</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="radio_typ" id="radio_typ" value="0">
                    <label class="form-check-label" for="radio_type_no">    @lang('validation.No')</label>
                </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang('validation.Submit')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--//update interview-->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Update Interview Detail</h5>

            </div>
            <div class="modal-body">
              <form id="intervie" method="POST" action="">
    @csrf
    <div class="mb-3">
        <label for="scheduled" class="form-label">@lang('interviews.interview_date_time')</label>
        <input type="datetime-local" class="form-control" id="scheduled" name="scheduled" required>
    </div>

    <div class="form-group">
        <label style="margin-right: 5px;">@lang('interviews.interview_type') </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="upload_method" id="OnSite" value="Site" checked onclick="toggleUploadMethod('Site')">
            <label class="form-check-label" for="OnSite">@lang('messages.onsite')</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="upload_method" id="OnLine" value="Line" onclick="toggleUploadMethod('Line')">
            <label class="form-check-label" for="OnLine">@lang('messages.online')</label>
        </div>
    </div>

    <div class="mb-3" id="location">
        <label for="location" class="form-label">@lang('messages.location')</label>
        <input type="text" id="location" class="form-control" name="location" placeholder="Enter interview location">
    </div>
    <div class="mb-3 d-none" id="link">
        <label for="Link" class="form-label">@lang('messages.link')</label>
        <input type="text" class="form-control" name="link" placeholder="Enter interview link">
    </div>

    <div class="mb-3">
        <label for="notes" class="form-label">@lang('interviews.additional_notes')</label>
        <textarea class="form-control" id="note" name="notes" rows="3" placeholder="Enter any notes"></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">@lang('applicants.schedule_interview')</button>
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
//   $(document).ready(function () {
//       $('#usersTable').DataTable({
//           responsive: true,
//           autoWidth: false,
//           paging: true,
//           searching: true,
//           ordering: true,
//           columnDefs: [
//               { orderable: false, targets: [10, 11, 12] } // Disable ordering for specific columns
//           ]
//       });
//   });

  function openEditModal(interviewId, use,job) {
      document.getElementById('interviewid').value = interviewId;
      document.getElementById('user').value = use;
      document.getElementById('jobs').value = job;
      $('#addCategoryModal').modal('show');
  }

  function rescheduleInterview(id, time, location, link, note) {

      document.getElementById('scheduled').value = time;
      document.getElementById('note').value = note;

      if (location !== "empty") {
          document.getElementById('OnSite').checked = true;
          toggleUploadMethod('Site');
          document.getElementById('location').querySelector('input').value = location;
      } else {
          document.getElementById('OnLine').checked = true;
          toggleUploadMethod('Line');
          document.getElementById('link').querySelector('input').value = link;
      }

      const formAction = "{{ route('recruiter.reschedule', ':id') }}".replace(':id', id);
      document.getElementById('intervie').action = formAction;
      $('#addModal').modal('show');
  }

  function toggleUploadMethod(method) {
      document.getElementById('location').classList.toggle('d-none', method !== 'Site');
      document.getElementById('link').classList.toggle('d-none', method !== 'Line');
  }
</script>


@endsection




