@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 94px;"></div>

<div class="site-section bg-light">
    <div class="container">
        <div class="profile-body">
              @include('../frontend/profile/sidebar')
               <div class="main-content">
                <h2 class="text-center"><strong>Applicants</strong></h2>
                 <div class="row mt-3">
            <div class="col-md-12">
                <!-- <div class="card bg-white"> -->
                @if (count($applicants) > 0)
                    
                <div class="card">
                    @foreach ($applicants as $applicant)
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Job Title: <a href="{{ route('job.show', [$applicant->id, $applicant->slug]) }}">{{ $applicant->title }}</a>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-info" href="{{ route('filter_applicants', [$applicant->id]) }}"><i class="bi bi-search"></i>Filter Applicants</a>
                        </div>
                    </div>

                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Job</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Skills</th>
                                    <th>Specialization</th>
                                    <th>Resume</th>
                                     <th>Cover Later</th>
                                      <th>Interview</th>
                                      <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach ($applicant->users as $user)
                                <?php $i++; ?>
                                <tr>
                                  <td> {{ $i }}</td>
                                  <td>  {{ $applicant->title }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ $user->profile->gender }}</td>
                                  <td>{{ $user->profile->skills }}</td>
                                  <td>{{ $user->profile->specialization }}</td>
                                  <td>  @if ($user->profile->resume)
                                    <a class="badge badge-secondary" target="_blank" href="{{ asset($user->profile->resume) }}">View</a>
                                    @else
                                    Not Uploaded
                                    @endif</td>
                                  <td>   @if ($user->profile->cover_letter)
                                    <a class="badge badge-secondary" target="_blank" href="{{ asset($user->profile->cover_letter) }}">View</a>
                                    @else
                                    Not Uploaded
                                    @endif</td>
                                  <td>   @php
                                        $job = $applicant->id;
                                        $user_id = $user->id;
                                        $data = $applicant->checkInterview($user_id);
                                    @endphp
                                    @if (!$data && Auth::user()->user_type === 'Recruiter')
                                    <a class="btn btn-sm btn-primary" onclick="openEditModal('{{ $job }}', '{{ $user_id }}')">Create</a>
                                    @else
                                    {{ $data->scheduled_at ?? "Not Scheduled" }}
                                    @endif</td>
                                 <td>   <a href="{{ route('job.show', [$applicant->id, $applicant->slug]) }}" class="text-success mx-2" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                    @endforeach
                </div>
                @else

                    <h3 class="text-center">No applicants apply your yet.</h3>

                @endif
            </div>

        </div>

                </div>
          </div>
        </div>
    </div>
</div>

<!-- Interview Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Interview Detail</h5>
            </div>
            <div class="modal-body">
                <form id="interviews" method="POST" action="{{ route('interview') }}">
                    @csrf
                    <input type="hidden" id="jobsid" name="job_id" value="">
                    <input type="hidden" id="usersid" name="user_id" value="">

                    <div class="mb-3">
                        <label for="scheduled_at" class="form-label">Interview Date & Time</label>
                        <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" required>
                    </div>
                    <div class="form-group">
                        <label>Interview Type:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="upload_method" id="OnSite" value="Site" checked onclick="toggleUploadMethod('Site')">
                            <label class="form-check-label" for="OnSite">OnSite</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="upload_method" id="OnLine" value="Line" onclick="toggleUploadMethod('Line')">
                            <label class="form-check-label" for="OnLine">OnLine</label>
                        </div>
                    </div>
                    <div class="mb-3" id="location">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter interview location">
                    </div>
                    <div class="mb-3 d-none" id="link">
                        <label for="Link" class="form-label">Link</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter interview link">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter any notes"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Schedule Interview</button>
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
