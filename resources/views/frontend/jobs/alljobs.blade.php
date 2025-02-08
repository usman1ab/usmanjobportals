@extends('layouts.main')

@section('content')


<div style="height: 170px;"></div>
    <div class="container jobs">
      <form action="{{route('alljobs')}}">
        <div class="row mb-4">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>

                    <input type="text" class="form-control border-start-0" name="search" placeholder="{{ __('messages.search_placeholder') }}">
                    <button class="btn btn-success" type="submit">{{ __('messages.find_jobs') }}</button>

                </div>
            </div>
        </div>
        </form>
    @php
    $count = $jobs->total();
    @endphp


        <div class="row mb-4">

            <div class="col-12 col-md-6 text-center text-md-start">
                <h4><span>{{ __('messages.we_found') }}</span> <strong>{{$count}} {{ __('messages.job_vacancies') }}</strong></h4>
            </div>

        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center mt-2 mt-md-0">
    <label for="sort" class="me-2 mb-0 d-flex align-items-center">
        <i class="bi bi-grid-fill me-1"></i> {{ __('messages.sort_by') }}
    </label>
    <select id="sort" class="form-select form-select-sm" style="width: auto;">
        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>{{ __('messages.posted_date') }}</option>
        <option value="relevance" {{ request('sort') == 'relevance' ? 'selected' : '' }}>{{ __('messages.relevance') }}</option>
    </select>
</div>

        </div>



        <div class="row">

            <div class="col-md-3 mt-1">
                <div class="sidebar">
                    <h5>{{ __('messages.filter_jobs') }}</h5>
                    <hr>
    <form id="filterForm" action="{{ route('alljobs') }}" method="GET">
    <h6>{{ __('messages.country') }}</h6>
    <ul class="list-unstyled">
        <li>
            <input type="checkbox" name="countries[]" value="Saudi Arabia"
                   {{ in_array('Saudi Arabia', request('countries', [])) ? 'checked' : '' }}>
            {{ __('messages.saudi_arabia') }}
        </li>
        <li>
            <input type="checkbox" name="countries[]" value="United Arab Emirates"
                   {{ in_array('United Arab Emirates', request('countries', [])) ? 'checked' : '' }}>
            {{ __('messages.uae') }}
        </li>
        <li>
            <input type="checkbox" name="countries[]" value="Egypt"
                   {{ in_array('Egypt', request('countries', [])) ? 'checked' : '' }}>
            {{ __('messages.egypt') }}
        </li>
    </ul>
    <hr>
    <h6>{{ __('messages.city') }}</h6>
    <ul class="list-unstyled">
        <li>
            <input type="checkbox" name="cities[]" value="Dubai"
                   {{ in_array('Dubai', request('cities', [])) ? 'checked' : '' }}>
            {{ __('messages.dubai') }}
        </li>
        <li>
            <input type="checkbox" name="cities[]" value="Riyadh"
                   {{ in_array('Riyadh', request('cities', [])) ? 'checked' : '' }}>
            {{ __('messages.riyadh') }}
        </li>
    </ul>
    <button type="submit" class="btn btn-primary">{{ __('messages.apply_filters') }}</button>
</form>


                </div>
            </div>

         <div class="col-md-9 mt-1">
    @if ($jobs->total() > 0)
        @foreach ($jobs as $job)
            <div class="job-card p-3 mb-3"
                 data-country="{{ $job->country }}"
                 data-city="{{ $job->city }}">
               <div class="d-flex align-items-center">
                        <img src="{{ asset('backend/assets/images/market.png') }}" alt="Job" class="me-3" style="width: 80px; height: 80px;">
                        <div>
                            <h5 class="job-title mb-1">{{$job->title}}</h5>
                            <p class="job-meta mb-0">{{$job->address}}</p>
                        </div>
                    </div>


                    <div class="mt-3 d-flex flex-wrap">
                        <span class="job-meta me-3"><strong>{{ __('messages.job_role') }}:</strong> {{$job->roles}}</span>
                        <span class="job-meta me-3"><strong>{{ __('messages.career_level') }}: </strong>{{ $job->position}}</span>
                        <span class="job-meta me-3"><strong>{{ __('messages.industry') }}:</strong> {{$job->category->name}}</span>
                        <span class="job-meta"><strong>{{ __('messages.experience') }}:</strong> {{$job->experience}}</span>
                    </div>


                    <p class="mt-3">
                        {{$job->description}}
                    </p>


                    <div class="d-none d-md-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="btn btn-success btn-sm">{{ __('messages.view_job_details') }}</a>
                        <div class="text-end text-muted">
                            <span class="me-2">

                                <strong>{{ __('messages.source') }}:</strong>
                               {{$job->company->cname}}</span>
                            <span><i class="bi bi-clock"></i> {{$job->created_at->diffForHumans()}}</span>
                        </div>
                    </div>

            </div>
        @endforeach
        <div class="col-md-12 text-center mt-5">
            {{ $jobs->appends(request()->query())->links() }}
        </div>
    @else
        <div class="text-center mt-5">
            <h4>{{ __('messages.no_jobs_found') }}</h4>
        </div>
    @endif
</div>

        </div>
    </div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filters = document.querySelectorAll('#filterForm input[type="checkbox"]');

    filters.forEach(filter => {
        filter.addEventListener('change', () => {
            document.getElementById('filterForm').submit();
        });
    });
         const sortDropdown = document.getElementById('sort');

        sortDropdown.addEventListener('change', function () {
            const selectedSort = this.value;

            const params = new URLSearchParams(window.location.search);
            params.set('sort', selectedSort);
            window.location.search = params.toString();
        });
});

</script>

@endsection
