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
                <h2><strong>@lang('validation.onboard')</strong></h2>


                <!-- Responsive Table -->
                <div class="table-responsive">
                    @if (count($data) > 0)
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('job.job_title')</th>
                                <th scope="col">@lang('applicants.applicants')</th>
                                <th scope="col">@lang('validation.visa')</th>
                                 <th scope="col">@lang('validation.flight_ticket')</th>
                                <th scope="col">@lang('validation.housing_insurance')</th>

                            </tr>
                        </thead>
                        <tbody>

                                <?php $i = 0; ?>
                                @foreach ($data as $datas)
                                <?php $i++; ?>
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $datas->job->title }}</td>
                                    <td>{{ $datas->user_name->name }}</td>
                                  <td>  @if(empty($datas->visa))
                                       <!--<i class="bi bi-x-lg  alert-danger"></i> -->
                                        <a data-bs-toggle="modal" class="btn btn-info text-white fs-10" data-bs-target="#refers-{{ $datas->id }}"> <small>Upload Visa</small></a>
                                    @else
                                    
                                    <a href="{{ route('job.onboard',[$datas->id])}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form13-{{$datas->id}}').submit();" class="dropdown-item"> <i class="bi bi-check-lg  alert-success"></i></a>
                                  <form id="logout-form13-{{$datas->id}}" action="{{ route('job.onboard',[$datas->id]) }}" method="POST" class="d-none">
                          @csrf
                          <input type="hidden" name="visa_name" value="visa">
                      </form>
                                  @endif
                                    <div class="modal fade" id="refers-{{ $datas->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@lang('validation.add_visa')</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('job.onboard',[$datas->id]) }}" id="myForms" method="POST" enctype="multipart/form-data" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="job_id" value="">
                                                            <div class="form-group">
                                                                <label for="user_id">@lang('validation.visa_document')</label>
                                                                <input type="file"  name="visa" id="user" class="form-control" required>


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
                               <td>  @if(empty($datas->flight))
                               <!--<i class="bi bi-x-lg  alert-danger"></i> -->
                                      <a data-bs-toggle="modal" class="btn btn-dark text-white fs-10"  data-bs-target="#refer-{{ $datas->id }}"><small>Upload Ticket</small></a>
                                    @else
                                     <a href="{{ route('job.onboard',[$datas->id])}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form12-{{$datas->id}}').submit();" class="dropdown-item"> <i class="bi bi-check-lg  alert-success"></i></a>
                                 <form id="logout-form12-{{$datas->id}}" action="{{  route('job.onboard',[$datas->id]) }}" method="POST" class="d-none">
                          @csrf
                          <input type="hidden" name="flight_name" value="visa">
                      </form>
                                  @endif
                                    <!-- Refer Modal -->
                                        <div class="modal fade" id="refer-{{ $datas->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@lang('validation.flight_ticket')</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('job.onboard',[$datas->id]) }}" id="myForm" method="POST" enctype="multipart/form-data" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="job_id" value="">
                                                            <div class="form-group">
                                                                <label for="user_id">@lang('validation.flight_ticket_document')</label>
                                                                <input type="file" name="flight"  class="form-control" required>

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

                                    <td>  @if(empty($datas->housing))
                                    <!--<i class="bi bi-x-lg  alert-danger"></i>-->
                                    <a data-bs-toggle="modal" class="btn btn-primary text-white text-sm" data-bs-target="#companyJobDelete-{{ $datas->id }}">
    <small class="small-text">Upload Document</small>
</a>

                                    @else
                                    <a href="{{route('job.onboard',[$datas->id])}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form11-{{$datas->id}}').submit();" class="dropdown-item"> <i class="bi bi-check-lg  alert-success"></i></a>
                                <form id="logout-form11-{{$datas->id}}" action="{{ route('job.onboard',[$datas->id])}}" method="POST" class="d-none">
                          @csrf
                          <input type="hidden" name="housing_name" value="visa">
                      </form>
                                  @endif
                                       <!-- Delete modal -->
                                            <div class="modal fade" id="companyJobDelete-{{ $datas->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $datas->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $datas->id }}">@lang('validation.add_housing_insurance')</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                        <form action="{{ route('job.onboard',[$datas->id]) }}" method="POST" enctype="multipart/form-data" >
                                                        @csrf
                                                    <div class="modal-body text-center">
                                                           <div class="form-group">
                                                                <label for="user_id">@lang('validation.housing_insurance_document')</label>
                                                                <input type="file" name="Housing"  class="form-control" required>

                                                            </div>
                                                    </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('categories.cancel')</button>
                                                            <button type="submit" class="btn btn-success">@lang('validation.Submit')</button>
                                                        </div>
                                                    </form>


                                                </div>
                                                </div>
                                            </div>
                                  </td>



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


