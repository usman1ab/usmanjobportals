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
                    <h2 class="mb-0"><strong>{{ __('messages.profile_information') }}</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil"></i> {{ __('messages.edit') }}
                    </a>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-user"></i> {{ __('message.name') }}:</span>
                    <span>{{ Auth::user()->name ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="bi bi-envelope-at"></i> {{ __('message.email') }}:</span>
                    <span>{{ Auth::user()->email ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-phone"></i> {{ __('messages.phone') }}:</span>
                    <span>{{ Auth::user()->profile->phone ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-birthday-cake"></i> {{ __('messages.date_of_birth') }}:</span>
                    <span>{{ Auth::user()->profile->dob ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-venus-mars"></i> {{ __('messages.gender') }}:</span>
                    <span>{{ Auth::user()->profile->gender ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-globe"></i> {{ __('messages.position') }}:</span>
                    <span>{{ Auth::user()->user_type ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> {{ __('messages.address') }}:</span>
                    <span>{{ Auth::user()->profile->address ?? "-" }}</span>
                </div>
                <h2 style="margin-top: 5px">{{ __('messages.experience') }}:</h2>
                <div class="skills">
                    <div class="skill">{{ Auth::user()->profile->experience ?? "" }}</div>
                </div>
                <h2 style="margin-top: 5px">{{ __('messages.bio') }}:</h2>
                <div class="skills">
                    <div class="skill">{{ Auth::user()->profile->bio ?? ""}}</div>
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
                <h5 class="modal-title" id="editProfileModalLabel">{{ __('messages.edit_profile') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->profile->phone ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">{{ __('messages.date_of_birth') }}</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ Auth::user()->profile->dob ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">{{ __('messages.gender') }}</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="Male" {{ Auth::user()->profile->gender === 'Male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                            <option value="Female" {{ Auth::user()->profile->gender === 'Female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">{{ __('messages.experience') }}</label>
                        <input type="text" class="form-control" id="experience" name="experience" value="{{ Auth::user()->profile->experience ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">{{ __('messages.address') }}</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->profile->address ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">{{ __('messages.bio') }}</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3">{{ Auth::user()->profile->bio ?? '' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('messages.save_changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
