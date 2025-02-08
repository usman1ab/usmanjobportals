@extends('../admin/layouts.app')

@section('content')

    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>{{ __('message.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.edit') }}: {{ $employer->name ?? '' }}</li>
            </ol>
        </nav>
        <div class="create-item">
            <a href="{{ url('/dashboard/companies/staff') }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;{{ __('Back to staff') }}</a>
        </div>
    </div>
    <!--  Header BreadCrumb -->

    <div class="card bg-white">
        <div class="card-body mt-1 mb-5">
            <form action="{{ route('adminStaffUpdate', [$employer->id]) }}" method="post">
                @csrf

                <div class="form-group row">
                    <div class="col-md-2">{{ __('message.name') }}</div>
                    <div class="col-md-4">
                        <input type="text" name="name" value="{{ $employer->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('name') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">{{ __('message.email') }}</div>
                    <div class="col-md-4">
                        <input type="email" name="email" value="{{ $employer->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        @if ($errors->has('email'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('email') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">{{ __('message.phone') }}</div>
                    <div class="col-md-4">
                        <input type="text" name="phone" value="{{ $employer->profile->phone ?? '' }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                        @if ($errors->has('phone'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('phone') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">{{ __('message.address') }}</div>
                    <div class="col-md-4">
                        <input type="text" name="address" value="{{ $employer->profile->address ?? '' }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                        @if ($errors->has('address'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('address') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group pt-2 row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <button class="theme-primary-btn btn btn-success" type="submit">{{ __('Update Staff') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
