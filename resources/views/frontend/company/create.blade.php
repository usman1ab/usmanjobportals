@extends('layouts.main')
@include('../frontend/profile/style')
@section('content')
<div style="height: 95px;"></div>



<div class="site-section bg-light">
 <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
           @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>@lang('messages.profile_information')</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil"></i> @lang('message.edit')
                    </a>
                </div>
                 <div class="info-item">
                    <span><i class="fas fa-user"></i>@lang('footer.company')</span>
                    <span>{{ Auth::user()->company->cname ?? "-"}}</span>
                </div>
                   <div class="info-item">
                    <span><i class="bi bi-envelope-at"></i> @lang('message.email')</span>
                    <span>{{Auth::user()->email ?? "-"}}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-phone"></i> @lang('message.phone')</span>
                    <span>{{Auth::user()->company->phone ?? "-"}}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-birthday-cake"></i> @lang('validation.website')</span>
                    <span>{{Auth::user()->company->website ?? "-"}}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-venus-mars"></i> @lang('validation.slogan')</span>
                    <span>{{Auth::user()->company->slogan ?? "-"}}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> @lang('job.address')</span>
                    <span>{{Auth::user()->company->address ?? "-"}}</span>
                </div>
                <h2 style="margin-top: 5px">@lang('message.bio')</h2>
                <div class="skills">
                        <div class="skill">{{ Auth::user()->company->description }}</div>
                </div>

            </div>
        </div>
    </div>




</div>
</body>


<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">@lang('message.edit')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('company.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cname" class="form-label">@lang('footer.company')</label>
                        <input type="text" class="form-control" id="cname" name="cname" value="{{ Auth::user()->company->cname ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('message.email')</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('message.phone')</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->company->phone ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">@lang('validation.website')</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ Auth::user()->company->website ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="slogan" class="form-label">@lang('validation.slogan')</label>
                        <input type="text" class="form-control" id="slogan" name="slogan" value="{{ Auth::user()->company->slogan ?? '' }}">
                    </div>


                    <div class="mb-3">
                        <label for="address" class="form-label">@lang('job.address')</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->company->address ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('message.bio')</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ Auth::user()->company->description ?? '' }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('sidebar.close')</button>
                    <button type="submit" class="btn btn-info">@lang('validation.Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
