@extends('layouts.main')

@section('content')
<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">Jobs by : {{ $categoryName->name }}</h1>
    <p class="mb-0 unit-6"><a href="/">@lang('home.home')</a> <span class="sep"> > <a href="{{ route('alljobs') }}">@lang('job.jobs')</a> </span> <span><span class="sep m-0"> ></span> @lang('categories.categories')</span></p>
  </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mt-5 mb-5">


            <div class="col-md-12">


                <div class="card">
                    <div class="card-header"><h3>@lang('validation.all') {{ $categoryName->name }}@lang('validation.category_job')</h3></div>

                    <div class="card-body">
                        @if (count($jobs) > 0)

                        <table class="table table-responsive text-center">
                            <thead>
                            <tr>
                                <th scope="col">@lang('job.sl')</th>
                                <th scope="col">@lang('validation.logo')</th>
                                <th scope="col">@lang('validation.title')</th>
                                <th scope="col">@lang('job.address')</th>
                                <th scope="col">@lang('job.job_type')</th>
                                <th scope="col">@lang('validation.job_posted')</th>

                                <th scope="col">@lang('job.action')</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php $i=0; ?>
                                @foreach ($jobs as $job)
                                <?php $i++; ?>
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <img src="{{ asset('/uploads/logo') }}/gridtemplate.png"  style="border-radius: 50px" width="50" height="50" alt="">
                                        </td>
                                        <td width="25%">{{ $job->title }}</td>
                                        <td width="20%"><i class="fas px-2 fa-map-marker-alt"></i>{{ Str::limit($job->address, 20)}}</td>
                                        <td><i class="fas px-2 fa-business-time"></i>{{  Str::ucfirst($job->type)}}</td>
                                        <td><i class="far px-2 fa-clock"></i> {{ $job->created_at->diffForHumans() }}</td>

                                        <td><a href="{{ route('job.show', [$job->id, $job->slug]) }}"><button class="btn btn-success btn-sm">@lang('validation.apply')</button></a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        @else

                        <h4 class="text-center">No category job posted yet.</h4>


                        @endif


                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">

                {{ $jobs->links() }}

        </div>

        </div>

    </div>

</div>
@endsection

<style>
td i{
    color: #4183d7
}
</style>
