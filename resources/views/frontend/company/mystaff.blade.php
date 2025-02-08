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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>@lang('sidebar.my_staff')</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#addstaffModal">
                        <i class="bi bi-person-plus"></i> @lang('validation.add_new') </a>
                </div>

                <!-- Responsive Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('message.name')</th>
                                <th scope="col">@lang('message.email')</th>
                                <th scope="col">@lang('messages.position')</th>
                                <th scope="col">@lang('job.created_on')</th>
                                <th scope="col">@lang('job.status')</th>
                                <th scope="col">@lang('job.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($users as $user)
                            <?php $i++; ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td>{{ date($user->created_at) }}</td>
                                <td>
                                    <a class="badge badge-lg {{ $user->status == '0' ? 'badge-danger' : 'badge-success' }} text-white"
                                       href="{{ route('UserToggle', [$user->id]) }}">
                                        {{ $user->status == '0' ? __('Deactive') : __('Active') }}
                                    </a>
                                </td>
                                <td>
                                    <!-- Icons for Actions -->
                                    <!--<a href="#" class="text-success mx-2" title="View">-->
                                    <!--    <i class="fas fa-eye"></i>-->
                                    <!--</a>-->
                                    <a href="#" class="text-secondary m-2" title="Edit" data-bs-toggle="modal" data-bs-target="#editProfileModal-{{ $user->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="#" class="text-danger mx-2" title="Delete" data-bs-toggle="modal" data-bs-target="#destroyUser-{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <!-- Edit Profile Modal -->
                                    <div class="modal fade" id="editProfileModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editProfileModalLabel">@lang('message.edit')</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('updatestaff') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" required>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                        <label for="name" class="form-label">@lang('message.name')</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">@lang('message.email')</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">@lang('messages.position')</label>
                                                        <select name="user_type" id="user_type" class="form-control" required>
                                                            <option value="{{ $user->user_type }}" >{{ $user->user_type }}</option>
                                                            @foreach (App\Models\Role::where('id', '>', 1)->get() as $type)
                                                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('sidebar.close')</button>
                                                        <button type="submit" class="btn btn-info">@lang('messages.save_changes')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="destroyUser-{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">@lang('validation.delete_staff')</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('user.delete',[$user->id]) }}" id="Forms" method="POST">

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <div class="modal-body">
                                                   @lang('validation.do_you_want_to_delete_staff') "<strong>{{ $user->name }}</strong>"?
                                                </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('job.cancel')</button>

                                                        <button type="submit" onclick="submits('Forms');" class="btn btn-danger">@lang('job.delete')</button>

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


<!-- Add Staff Modal -->
<div class="modal fade" id="addstaffModal" tabindex="-1" aria-labelledby="addstaffModalLabel"
     aria-hidden="true" data-show="{{ $errors->any() ? 'true' : 'false' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addstaffModalLabel">@lang('validation.add_new_staff')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('empl.register') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="company_id" name="company_id" value="{{ Auth::user()->company->id ?? '' }}" required>

                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('message.name')</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('message.email')</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="user_type" class="form-label">@lang('messages.position')</label>
                        <select name="user_type" id="user_type" class="form-control" required>
                            <option value="">Select Employee Position</option>
                            @foreach (App\Models\Role::where('id', '>', 1)->get() as $type)
                                <option value="{{ $type->name }}" {{ old('user_type') == $type->name ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">@lang('job.status')</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>@lang('job.active')</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>@lang('message.deactivate')</option>
                        </select>
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
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addstaffModal');
    const shouldShow = modal.getAttribute('data-show') === 'true';

    if (shouldShow) {
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
    }
});

    function submitForm(formId) {
  // Get the form element by its ID
  const form = document.getElementById(formId);

  // Check if the form element exists
  if (form) {
    // Submit the form
    form.submit();
  } else {
    console.error(`Form with ID '${formId}' not found.`);
  }
}
    function submits(formId) {
  // Get the form element by its ID
  const forms = document.getElementById(formId);

  // Check if the form element exists
  if (forms) {
    // Submit the form
    forms.submit();
  } else {
    console.error(`Form with ID '${formId}' not found.`);
  }
}

</script>
