@extends('layouts.main')
@include('../frontend/profile/style')

@section('content')
<div style="height: 50px;"></div>

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
            @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4"> <h2><strong>@lang('sidebar.selection')</strong></h2></div>

<div class="table-responsive">
                    @if (count($data) > 0)
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('applicants.applicants')</th>
                                <th scope="col">@lang('job.jobs')</th>
                                <th scope="col">@lang('messages.feedbacks')</th>
                                <th scope="col">@lang('job.status')</th>
                                <th scope="col">@lang('job.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($data as $datas)
                            <?php $i++; ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $datas->user->name }}</td>
                                <td>{{ $datas->job->title }}</td>
                                <td><span class="badge badge-info"><a class="text-white" href="{{ route('feedbackss', $datas->id) }}">@lang('messages.view')</a></span></td>
                                <td>
                                    @if ($datas->score->status === 'pending')
                                        <span class="badge badge-lg badge-success text-white">
                                            {{ $datas->score->status }}
                                        </span>
                                    @elseif ($datas->score->status === 'selected')
                                        <span class="badge badge-lg badge-info text-white">
                                            {{ $datas->score->status }}
                                        </span>
                                    @else
                                        <span class="badge badge-lg badge-danger text-white">
                                            {{ $datas->score->status }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($datas->score->status === 'selected') Offer latter sent @elseif($datas->score->status === 'rejected') rejected @else
                                   <div class="dropdown">
    <button class="dropdown-toggle-btn">
        <i class="fa fa-cogs"></i>  @lang('job.action') @endif
    </button>
    <div class="dropdown-menu">
        <a href="#" data-bs-toggle="modal" data-bs-target="#selection_{{$datas->id}}" class="dropdown-item">
            <i class="fa fa-check"></i> @lang('validation.selected')
        </a>
        <a href="{{route('toggle',['action'=>'rejected','id'=>$datas->score->id])}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form11-{{$datas->id}}').submit();" class="dropdown-item">
            <i class="fa fa-times"></i> @lang('validation.rejected')
        </a>
        <a href="{{route('toggle',['action'=>'pending','id'=>$datas->score->id])}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form22-{{$datas->id}}').submit();" class="dropdown-item">
            <i class="fa fa-clock"></i> @lang('messages.pending')
        </a>
    </div>
</div>

<!-- Edit Image Modal -->
<div class="modal fade" id="selection_{{$datas->id}}" tabindex="-1" aria-labelledby="selection_label{{$datas->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selection_label{{$datas->id}}">@lang('validation.add_offer_latter')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('toggle', ['action' => 'selected', 'id' => $datas->score->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="avatar" value="avatar">
                        <input type="file" class="form-control" name="selected" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('sidebar.close')</button>
                    <button type="submit" class="btn btn-info">@lang('sidebar.upload')</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <form id="logout-form11-{{$datas->id}}" action="{{ route('toggle',['action'=>'rejected','id'=>$datas->score->id]) }}" method="POST" class="d-none">
                          @csrf
                      </form>
                       <form id="logout-form22-{{$datas->id}}" action="{{route('toggle',['action'=>'pending','id'=>$datas->score->id]) }}" method="POST" class="d-none">
                          @csrf
                      </form>


                                </td>
                            </tr>
                                <div class="pagination-wrapper">
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>
                            @endforeach
                        </tbody>
                    </table>

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
document.addEventListener('click', function (event) {
    const dropdown = event.target.closest('.dropdown');
    document.querySelectorAll('.dropdown').forEach(d => {
        if (d !== dropdown) d.classList.remove('show');
    });

    if (dropdown) {
        dropdown.classList.toggle('show');
    }
});
</script>
