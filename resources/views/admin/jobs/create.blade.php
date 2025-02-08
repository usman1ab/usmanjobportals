@extends('../admin/layouts.app')

@section('content')

    <!--  Header BreadCrumb -->
    <div class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>{{ __('job.home') }}</a></li>

        <li class="breadcrumb-item active" aria-current="page">{{ __('job.create_new_job') }}</li>
        </ol>
    </nav>
    <div class="create-item">
        <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;{{ __('job.back_to_jobs') }}</a>
    </div>
</div>
    <!--  Header BreadCrumb -->

<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

        <form action="{{ route('adminJobStore') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.job_title') }}</div>
                <div class="col-md-4">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    @if ($errors->has('title'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('title') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.job_position') }}</div>
                <div class="col-md-4">
                    <input type="text" name="position" value="{{ old('position') }}" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}">
                    @if ($errors->has('position'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('position') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.year_of_experience') }}</div>
                <div class="col-md-4">
                    <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience') }}">
                    @if ($errors->has('experience'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('experience') }}</strong>
                    </span>
                     @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.job_type') }}</div>
                <div class="col-md-4">
                    <select name="type" id="type" class="form-control">
                        <option value="fulltime">{{ __('job.fulltime') }}</option>
                        <option value="partime">{{ __('job.partime') }}</option>
                        <option value="remote">{{ __('job.remote') }}</option>
                    </select>
                    @if ($errors->has('type'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('type') }}</p>
                        </div>
                    @endif
              </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.category') }}</div>
                <div class="col-md-4">
                    <select name="category" id="category" class="form-control">
                        @foreach (App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('category') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.address') }}</div>
                <div class="col-md-4">
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('address') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.role') }}</div>
                <div class="col-md-6">
                    <textarea name="roles" style="height: 140px" class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}" >{{ old('roles') }}</textarea>
                    @if ($errors->has('roles'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('roles') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.description') }}</div>
                <div class="col-md-6">
                    <textarea name="description" id="editor" style="height: 120px"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('description') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.number_of_vacancy') }}</div>
                <div class="col-md-4">
                    <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" value="{{ old('number_of_vacancy') }}" >
                    @if ($errors->has('number_of_vacancy'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                    </span>
                     @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.gender') }}</div>
                <div class="col-md-4">
                    <select class="form-control" name="gender">
                        <option value="any">{{ __('job.any') }}</option>
                        <option value="male">{{ __('job.male') }}</option>
                        <option value="female">{{ __('job.female') }}</option>
                    </select>
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.salary_per_year') }}</div>
                <div class="col-md-4">
                    <select class="form-control" name="salary">
                        <option value="negotiable">{{ __('job.negotiable') }}</option>
                        <option value="2000-5000">{{ __('job.range_2000_5000') }}</option>
                        <option value="5000-10000">{{ __('job.range_5000_10000') }}</option>
                        <option value="10000-20000">{{ __('job.range_10000_20000') }}</option>
                        <option value="30000-500000">{{ __('job.range_30000_500000') }}</option>
                        <option value="500000-600000">{{ __('job.range_500000_600000') }}</option>
                        <option value="600000 plus">{{ __('job.range_600000_plus') }}</option>
                    </select>
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.status') }}</div>
                <div class="col-md-4">
                    <select name="status" id="status" class="form-control">
                        <option value="1">{{ __('job.live') }}</option>
                        <option value="0">{{ __('job.draft') }}</option>
                    </select>
                    @if ($errors->has('status'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('status') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">{{ __('job.last_date') }}</div>
                <div class="col-md-4">
                    <input type="date" name="last_date" value="{{ old('last_date') }}" class="form-control{{ $errors->has('last_date') ? ' is-invalid' : '' }}">
                    @if ($errors->has('last_date'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('last_date') }}</p>
                        </div>
                    @endif
                 </div>
            </div>

            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">{{ __('job.post_job') }}</button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection
