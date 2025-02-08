@extends('../admin/layouts.app')



@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('home.home')</a></li>

            <li class="breadcrumb-item active" aria-current="page">@lang('footer.company')</li>
          </ol>
        </nav>
        <div class="create-item">
            <!--<a href="#" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>&nbsp;Create new Company</a>-->
            <!--<a href="#" class="theme-secondary-btn btn btn-secondary"><i class="material-icons">import_export</i>&nbsp;Export Companies</a>-->
            <!--{{-- <a href="{{ route('adminEmpTrash') }}" class="theme-danger-btn btn btn-danger"><i class="material-icons">delete</i>&nbsp;Restore Companies</a> --}}-->

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

                                    <th>@lang('messages.company_name')</th>
                                    <th>@lang('message.email')</th>
                                    <th>@lang('message.email_verified')</th>
                                    <th>@lang('message.phone')</th>
                                    <th>@lang('job.address')</th>
                                    <th>@lang('job.status')</th>

                                    <th>@lang('job.action')</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i=0; ?>
                                @foreach ($employers as $employer)
                                <?php $i++ ?>


                                    <tr>
                                        <td>{{ $i }}</td>

                                        <td>{{ $employer->company->cname }}</td>
                                        <td>{{ $employer->email }}</td>
                                        <td>

                                            @if ($employer->email_verified_at)
                                            <i class="material-icons  alert-success">check_circle</i>
                                            @else
                                            <i class="material-icons  alert-danger">close</i>
                                            @endif

                                        </td>
                                        <td>{{ $employer->company->phone }}</td>
                                        <td>{{ $employer->company->address }}</td>
                                        <td>
                                            @if ($employer->status == '0')
                                                <a  class="badge badge-lg badge-danger text-white" href="{{ route('employerToggle',[$employer->id]) }}"
                                                    >{{ __('Deactive') }}</a>


                                            @else

                                                <a  class="badge badge-lg badge-success text-white" href="{{ route('employerToggle',[$employer->id]) }}"
                                                    >{{ __('Active') }}</a>



                                            @endif

                                        </td>

                                        <td style="width: 18%">
                                            <a  class="btn btn-sm btn-info" href="{{route('adminEditEmp',[$employer->id])}}"><i class="material-icons">@lang('message.edit')</i></a>


                                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#employerDelete-{{ $employer->id }}" type="button"><i class="material-icons">@lang('job.delete')</i></button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="employerDelete-{{ $employer->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $employer->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $employer->id }}">Company Name: {{ $employer->company->cname }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> @lang('messages.want_to_trash_company')</h4>
                                                    </div>
                                                    <form action="{{ route('adminEmpDelete') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $employer->id }}">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('job.cancel')</button>
                                                            <button type="submit" class="btn btn-danger">@lang('job.delete')</button>
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

@endsection
