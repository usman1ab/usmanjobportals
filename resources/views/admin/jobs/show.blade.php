@extends('../admin/layouts.app')

@section('content')
    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('job.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('job.view_job', ['title' => $job->title])</li>
            </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;@lang('job.back_to_jobs')</a>
        </div>
    </div>
    <!--  Header BreadCrumb -->

    <div class="card bg-white">
        <div class="card-body mt-1 mb-5">
            <div class="form-group row">
                <div class="col-md-2">@lang('job.job_title')</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->title }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">@lang('job.job_position')</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->position }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.year_of_experience')</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $job->experience }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.job_type')</div>
                <div class="col-md-4">
                    <select readonly class="form-control">
                        <option value="Fulltime"{{ $job->type=='Fulltime' ? 'selected':'' }}>@lang('job.fulltime')</option>
                        <option value="Partime"{{ $job->type=='Partime' ? 'selected':'' }}>@lang('job.partime')</option>
                        <option value="Remote"{{ $job->type=='Remote' ? 'selected':'' }}>@lang('job.remote')</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.category')</div>
                <div class="col-md-4">
                    <select readonly id="category_id" class="form-control">
                        @foreach (App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id==$job->category_id ? 'selected':'' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.address')</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->address }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.role')</div>
                <div class="col-md-6">
                    <textarea readonly style="height: 140px" class="form-control">{{ $job->roles }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.description')</div>
                <div class="col-md-6">
                    <textarea readonly style="height: 120px" class="form-control">{{ $job->description }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.number_of_vacancy')</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $job->number_of_vacancy }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.gender')</div>
                <div class="col-md-4">
                    <select class="form-control" readonly>
                        <option value="any"{{ $job->gender=='any' ? 'selected':'' }}>@lang('job.any')</option>
                        <option value="male"{{ $job->gender=='male' ? 'selected':'' }}>@lang('job.male')</option>
                        <option value="female"{{ $job->gender=='female' ? 'selected':'' }}>@lang('job.female')</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.salary_per_year')</div>
                <div class="col-md-4">
                    <select class="form-control" readonly>
                        <option value="negotiable"{{ $job->salary=='negotiable' ? 'selected':'' }}>@lang('job.negotiable')</option>
                        <option value="2000-5000"{{ $job->salary=='2000-5000' ? 'selected':'' }}>@lang('job.salary_2000_5000')</option>
                        <option value="50000-10000"{{ $job->salary=='50000-10000' ? 'selected':'' }}>@lang('job.salary_5000_10000')</option>
                        <option value="10000-20000"{{ $job->salary=='10000-20000' ? 'selected':'' }}>@lang('job.salary_10000_20000')</option>
                        <option value="30000-500000"{{ $job->salary=='30000-500000' ? 'selected':'' }}>@lang('job.salary_30000_500000')</option>
                        <option value="500000-600000"{{ $job->salary=='500000-600000' ? 'selected':'' }}>@lang('job.salary_500000_600000')</option>
                        <option value="600000 plus"{{ $job->salary=='600000 plus' ? 'selected':'' }}>@lang('job.salary_600000_plus')</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.status')</div>
                <div class="col-md-4">
                    <select readonly id="status" class="form-control">
                        <option value="1"{{ $job->status=='1' ? 'selected':'' }}>@lang('job.live')</option>
                        <option value="0"{{ $job->status=='0' ? 'selected':'' }}>@lang('job.draft')</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">@lang('job.last_date')</div>
                <div class="col-md-4">
                    <input type="date" readonly value="{{ $job->last_date }}" class="form-control">
                </div>
            </div>

            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="/dashboard/jobs" class="theme-primary-btn btn btn-success">@lang('job.back_to_jobs')</a>
                </div>
            </div>
        </div>
    </div>

@endsection
