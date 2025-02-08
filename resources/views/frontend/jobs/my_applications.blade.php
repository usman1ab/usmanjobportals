@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 94px;"></div>

<div class="site-section bg-light">
    <div class="container-fluid">
        <div class="profile-body">
              @include('../frontend/profile/sidebar')
               <div class="main-content">
                <h2 class="text-center"><strong>@lang('validation.my_job_applications')</strong></h2>
                 <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-body mt-3">
                      <div class="table-responsive">
                          <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>@lang('job.sl')</th>
                                    <th>@lang('job.jobs')</th>
                                    <th>@lang('interviews.interview')</th>
                                    <th>@lang('messages.offer')</th>
                                    <th>@lang('job.status')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($applications->count() > 0)
                            <?php $i = 0; ?>
                            @foreach ($applications as $data)
                            <?php $i++; ?>
                                <tr>
                                  <td>{{ $i }}</td>
                                  <td>{{ $data->job->title }}</td>
                                  <td>{{ $data->interview->scheduled_at ?? "Not Scheduled" }}</td>
                                  <td>{{ $data->selection->offer ?? "No Offer Yet" }}</td>
                                  <td>{{ $data->selection->status ?? "Pending" }}</td>
                                  <td>
                                    <a href="{{ route('job.show', [$data->job->id, $data->job->slug]) }}" class="text-success mx-2" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                  </td>
                                </tr>
                            @endforeach
                            @else
                                <h4 style = "text-align:center">No Job Application Found!</h4>
                            @endif
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>

        </div>

                </div>
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
