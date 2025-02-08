@extends('../admin/layouts.app')

@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>{{ __('message.dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('message.edit') }}: {{ $candidate->name }}</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/candidates" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;{{ __('message.back_to_candidates') }}</a>
        </div>
    </div>
      <!--  Header BreadCrumb -->

<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

        <form action="{{ route('adminCanUpdate', [$candidate->id]) }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.candidate_name') }}</div>
                <div class="col-md-4">
                    <input type="text" name="name" value="{{ $candidate->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
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
                    <input type="email" name="email" value="{{ $candidate->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.address') }}</div>
                <div class="col-md-4">
                    <input type="text" name="address" value="{{ $candidate->profile->address ?? '' }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('address') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.candidate_gender') }}</div>
                <div class="col-md-4">
                    <select class="form-control" name="gender">
                        <option value="any"{{ $candidate->profile->gender ?? '' == 'any' ? 'selected':'' }}>{{ __('message.any') }}</option>
                        <option value="male"{{ $candidate->profile->gender ?? '' == 'male' ? 'selected':'' }}>{{ __('message.male') }}</option>
                        <option value="female"{{ $candidate->profile->gender ?? '' == 'female' ? 'selected':'' }}>{{ __('message.female') }}</option>
                    </select>
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.date_of_birth') }}</div>
                <div class="col-md-4">
                    <input type="date" name="dob" value="{{ $candidate->profile->dob ?? '' }}" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}">
                    @if ($errors->has('dob'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('dob') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.experience') }}</div>
                <div class="col-md-4">
                    <input type="text" name="experience" value="{{ $candidate->profile->experience ?? '' }}" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}">
                    @if ($errors->has('experience'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('experience') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.phone') }}</div>
                <div class="col-md-4">
                    <input type="text" name="phone" value="{{ $candidate->profile->phone ?? '' }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                    @if ($errors->has('phone'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('phone') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('message.bio') }}</div>
                <div class="col-md-6">
                    <textarea name="bio" style="height: 140px" class="form-control">{{ $candidate->profile->bio ?? '' }}</textarea>
                    @if ($errors->has('bio'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('bio') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">{{ __('message.update_profile') }}</button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection
