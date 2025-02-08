@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 94px;"></div>

<div class="site-section bg-light">
    <div class="container">
        <div class="profile-body">
              @include('../frontend/profile/sidebar')
               <div class="main-contents">
                <h2 class="text-center"><strong>Filtered Applicants</strong></h2>

                @php
                    // Paginate users manually (4 per page)
                    $perPage = 4;
                    $currentPage = request()->input('page', 1);
                    $items = $ranked_users->forPage($currentPage, $perPage);
                    $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                        $items,
                        $ranked_users->count(),
                        $perPage,
                        $currentPage,
                        ['path' => request()->url(), 'query' => request()->query()]
                    );
                @endphp


                @foreach ($paginator as $data)
                    <!-- Job Card -->
                    <div class="job-cards position-relative">
                        <!-- Top-left Buttons -->
                        <div class="top-buttons position-absolute" style="top: 10px; right: 10px;">
                            @if ($data->profile->resume)
                                <a href="{{ asset($data->profile->resume) }}" class="btn btn-gradient-dark btn-sm mb-2 mr-2">
                                    <i class="bi bi-file-text"></i> Resume
                                </a>
                            @else
                                <a href="#" class="btn btn-gradient-dark btn-sm mb-2 mr-2">
                                    <i class="bi bi-file-text"></i> Not Uploaded
                                </a>
                            @endif
                            @if(!$data->interview)
                                <a onclick="openEditModal('{{ $data->job->id }}', '{{ $data->user->id }}')" class="btn btn-secondary btn-sm mb-2">
                                    Schedule Interview
                                </a>
                            @else
                                <a href="" class="btn btn-secondary btn-sm mb-2">
                                    <i class="bi bi-clock"></i>
                                    {{ \Carbon\Carbon::parse($data->interview->scheduled_at)->format('y-m-d') ?? "Not Scheduled" }}
                                </a>
                            @endif
                            <button class="btn btn-primary p-1 ml-2 mb-1" disabled>{{ round($data->score / 1 * 100,1) }}% Matched</button>
                        </div>

                        <!-- Profile Picture -->
                        <div class="profile-picture">
                            @if (!empty($data->profile->avatar))
                                <img src="{{ asset('uploads/avatar') }}/{{$data->profile->avatar}}" alt="Profile Picture">
                            @else
                                <img src="https://i.pravatar.cc/150" alt="profile image" class="img-fluid rounded-circle">
                            @endif
                        </div>

                        <!-- User Details -->
                        <div class="user-details">
                            <h2>{{$data->user->name}}</h2>
                            <p>{{$data->user->email}}</p>
                            <p class="job-title">{{$data->job->title}}</p>
                        </div>

                        <!-- Status Icons -->
                        <div class="status-icons mt-4">
                            @if(!empty($data))
                                <div class="icon-wrapper shortlisted">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Shortlisted</span>
                                </div>
                            @endif
                            @if(!empty($data->selection))
                                <div class="icon-wrapper interview">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <span>Interview</span>
                                </div>
                                <div class="icon-wrapper selection">
                                    <i class="bi bi-award-fill"></i>
                                    <span>{{$data->selection->status}}</span>
                                </div> 
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Pagination Links -->
                <div class="pagination-links">
                    {{ $paginator->links() }}
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