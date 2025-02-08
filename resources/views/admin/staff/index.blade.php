@extends('../admin/layouts.app')

@section('content')

    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>{{ __('message.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('messages.staff')</li>
            </ol>
        </nav>
        <div class="create-item">
            <!--<a href="#" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>&nbsp;{{ __('message.create_new_employers') }}</a>-->
            <!--<a href="#" class="theme-secondary-btn btn btn-secondary"><i class="material-icons">import_export</i>&nbsp;{{ __('message.export_employers') }}</a>-->
        </div>
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
                                    <th>#</th>
                                    <th>{{ __('message.name') }}</th>
                                    <th>{{ __(' Company Name') }}</th>
                                    <th>{{ __('message.email') }}</th>
                                    <th>{{ __('message.phone') }}</th>
                                    <th>{{ __('message.user_type') }}</th>
                                    <th>{{ __('message.email_verified') }}</th>
                                    <th>{{ __('message.status') }}</th>
                                    <th>{{ __('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($employers as $employer)
                                    <?php $i++ ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $employer->name }}</td>
                                        <td>{{ $employer->company->cname ?? '' }}</td>
                                        <td>{{ $employer->email }}</td>
                                        <td>{{ $employer->profile->phone ?? '' }}</td>
                                        <td>{{ $employer->user_type }}</td>
                                        <td>
                                            @if ($employer->email_verified_at)
                                                <i class="material-icons  alert-success">check_circle</i>
                                            @else
                                                <i class="material-icons  alert-danger">close</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employer->status == '0')
                                                <a class="badge badge-lg badge-danger text-white" href="{{ route('employerToggle', [$employer->id]) }}">
                                                    {{ __('message.deactivate') }}
                                                </a>
                                            @else
                                                <a class="badge badge-lg badge-success text-white" href="{{ route('employerToggle', [$employer->id]) }}">
                                                    {{ __('message.activate') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('staffEditStaff', [$employer->id]) }}"><i class="material-icons">edit</i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#employerDelete-{{ $employer->id }}" type="button"><i class="material-icons">delete</i></button>
                                            <!-- Delete modal -->
                                            <div class="modal fade" id="employerDelete-{{ $employer->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $employer->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $employer->id }}">{{ __('message.name') }}: {{ $employer->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h4>{{ __('message.want_to_trash_employee') }}</h4>
                                                        </div>
                                                        <form action="{{ route('adminStaffDelete') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="id" value="{{ $employer->id }}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('message.cancel') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ __('message.delete') }}</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users DataTable-->
@endsection
