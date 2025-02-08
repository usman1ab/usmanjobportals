@extends('../admin/layouts.app')

@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('categories.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('categories.create_new_category')</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/category" class="theme-primary-btn btn btn-primary"><i class="material-icons">arrow_back</i>&nbsp;@lang('categories.back_to_category')</a>
        </div>
    </div>
      <!--  Header BreadCrumb -->

<div class="card bg-white">
    <div class="card-body mt-1 mb-5">

        <form action="" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-2">@lang('categories.category_name')</div>
                <div class="col-md-4">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    @if ($errors->has('name'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button class="theme-primary-btn btn btn-success" type="submit">@lang('categories.create_category')</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
