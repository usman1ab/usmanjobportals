@extends('layouts.main')

@section('content')
<div style="height: 120px;"></div>


<div class="site-section bg-light">

<div class="container">
    <div class="row justify-content-center">

        @if (Session::has('message'))
            <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                <strong>Success !</strong> {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mt-1">@lang('messages.company_registration')</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.register') }}">
                        @csrf

                        <input type="hidden" id="user_type" name="user_type" value="employer">

                        <div class="row mb-3">
                            <label for="cname" class="col-md-4 col-form-label text-md-end">@lang('messages.company_name')</label>

                            <div class="col-md-6">

                                <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}"  autocomplete="cname" autofocus>

                                @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">@lang('message.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="license" class="col-md-4 col-form-label text-md-end">@lang('messages.company_license')</label>

                            <div class="col-md-6">
                                <input id="license" type="file" class="form-control @error('email') is-invalid @enderror" name="license" value="{{ old('license') }}">

                                @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="reg_certificate" class="col-md-4 col-form-label text-md-end">@lang('messages.registration_certificate')</label>

                            <div class="col-md-6">
                                <input id="reg_certificate" type="file" class="form-control @error('reg_certificate') is-invalid @enderror" name="reg_certificate" value="{{ old('reg_certificate') }}">

                                @error('reg_certificate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ownership_proof" class="col-md-4 col-form-label text-md-end">@lang('messages.proof_of_ownership')</label>

                            <div class="col-md-6">
                                <input id="ownership_proof" type="file" class="form-control @error('ownership_proof') is-invalid @enderror" name="ownership_proof" value="{{ old('ownership_proof') }}">

                                @error('ownership_proof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">@lang('messages.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">@lang('messages.confirm_password')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="cts btn">
                                   @lang('messages.register_as_company')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
