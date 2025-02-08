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
                    <h2 class="mb-0"><strong>@lang('validation.all_recent_jobs')</strong></h2>
                    @if (Auth::user()->user_type === 'employer' || Auth::user()->user_type === 'Recruiter')
                    <a class="btn btn-sm btn-info" href="{{ route('job.create') }}"><i class="bi bi-journal-text"></i>@lang('job.create_new_job')</a>
                    @endif
                </div>

                <!-- Responsive Table -->
                <div class="table-responsive">
                    @if (count($jobs) > 0)
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('job.job_title')</th>
                                <th scope="col">@lang('job.job_type')</th>
                                <th scope="col">@lang('validation.job_posted')</th>
                                 <th scope="col">@lang('applicants.applicants')</th>
                                <th scope="col">@lang('validation.share')</th>
                                <th scope="col">@lang('job.status')</th>
                                <th scope="col">@lang('job.action')</th>
                            </tr>
                        </thead>
                        <tbody>

                                <?php $i = 0; ?>
                                @foreach ($jobs as $job)
                                <?php $i++; ?>
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $job->title }}</td>
                                    <td><span class="badge badge-secondary">{{ Str::ucfirst($job->type) }}</span></td>
                                    <td><span class="badge badge-info">{{ $job->created_at->diffForHumans() }}</span></td>
                                     <td><a href="{{route('job.applied',$job->id)}}">

                                    <span class="badge badge-warning">@lang('messages.view')</span></td> </a>
                                    <td>
                                        <a href="https://www.linkedin.com" target="_blank" class="text-success mx-2" title="LinkedIn">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="https://www.indeed.com" target="_blank" class="text-success mx-2" title="Indeed">
                                            <i class="fas fa-briefcase"></i> <!-- Placeholder for Indeed -->
                                        </a>
                                    <td>
                                        @if (Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'employer')
                                            <a class="badge badge-lg {{ $job->status == '0' ? 'badge-danger' : 'badge-success' }} text-white"
                                               href="{{ route('job.toggle', [$job->id]) }}">
                                                {{ $job->status == '0' ? __('Draft') : __('Active') }}
                                            </a>
                                        @else
                                            <span class="badge badge-lg {{ $job->status == '0' ? 'badge-danger' : 'badge-success' }} text-white">
                                                {{ $job->status == '0' ? __('Draft') : __('Active') }}
                                            </span>
                                        @endif
                                    </td>
                                   <td>
                                        <!-- Icons for Actions -->
                                        <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="text-success mx-2" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if (Auth::user()->user_type === 'employer' || Auth::user()->user_type === 'Hiring Manager' || Auth::user()->user_type === 'Recruiter')
                                            <a href="{{ route('job.edit', [$job->id]) }}" class="text-secondary mx-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="text-danger mx-2" title="Delete" data-bs-toggle="modal" data-bs-target="#companyJobDelete-{{ $job->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="companyJobDelete-{{ $job->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $job->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $job->id }}">@lang('job.job_title') : {{ $job->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> @lang('validation.do_you_want_to_delete')</h4>
                                                    </div>
                                                    <form action="{{ route('job.delete',[$job->id]) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $job->id }}">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('job.cancel')</button>
                                                            <button type="submit" class="btn btn-danger">@lang('job.delete')</button>
                                                        </div>
                                                    </form>


                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                        <a href="#" class="text-info mx-2" title="Refer" data-bs-toggle="modal" data-bs-target="#refer-{{ $job->id }}">
                                            <i class="fas fa-share-alt"></i>
                                        </a>

                                        <!-- Refer Modal -->
                                        <div class="modal fade" id="refer-{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@lang('validation.refer_candidate')</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('candidate.refer') }}" id="myForm" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                            <div class="form-group">
                                                                <label for="user_id">@lang('message.candidate')</label>
                                                                <select name="user_id" id="user" class="form-control" required>
                                                                    <option value="">*Select Candidate*</option>
                                                                    @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('user_id'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('user_id') }}
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('job.cancel')</button>
                                                            <button type="submit" onclick="submitForm('myForm');" class="btn btn-success">@lang('validation.Submit')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                        </tbody>

                    </table>
                    <div class="pagination-wrapper">
                        {{ $jobs->links('pagination::bootstrap-4') }}
                    </div>
                    @else
                        <h3 class="text-center">No Jobs Found!.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>

    function submitForm(formId) {
  // Get the form element by its ID
  const form = document.getElementById(formId);

  // Check if the form element exists
  if (form) {
    // Submit the form
    form.submit();
  } else {
    console.error(`Form with ID '${formId}' not found.`);
  }
}
    function submits(Id) {
  // Get the form element by its ID
  const forms = document.getElementById(Id);

  // Check if the form element exists
  if (forms) {
    // Submit the form
    forms.submit();
  } else {
    console.error(`Form with ID '${formId}' not found.`);
  }
}

</script>

