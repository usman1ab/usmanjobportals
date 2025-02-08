@extends('../admin/layouts.app')

@section('content')

       <!--  Header BreadCrumb -->
       <div class="content-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>@lang('categories.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('categories.categories')</li>
          </ol>
        </nav>
        <div class="create-item">
            <a href={{ route('adminCatCreate') }} class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>&nbsp;@lang('categories.create_new_category')</a>
        </div>
    </div>
      <!--  Header BreadCrumb -->

        <!-- Categories DataTable-->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-body mt-3">
                      <div class="table-responsive">
                          <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>@lang('categories.sl')</th>
                                    <th>@lang('categories.category_name')</th>
                                    <th>@lang('categories.created_date')</th>
                                    <th>@lang('categories.status')</th>
                                    <th>@lang('categories.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach ($categories as $category)
                                <?php $i++ ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <span class="badge badge-secondary">{{ $category->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            @if ($category->status == '0')
                                                <a  class="badge badge-lg badge-danger text-white" href="{{ route('adminCatToggle',[$category->id]) }}">
                                                    @lang('categories.deactivate')
                                                </a>
                                            @else
                                                <a  class="badge badge-lg badge-success text-white" href="{{ route('adminCatToggle',[$category->id]) }}">
                                                    @lang('categories.activate')
                                                </a>
                                            @endif
                                        </td>
                                        <td style="width: 18%">
                                            <a class="btn btn-sm btn-info" href="{{route('adminEditCat',[$category->id])}}"><i class="material-icons">edit</i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#categoryDelete-{{ $category->id }}" type="button"><i class="material-icons">delete</i></button>

                                            <!-- Delete modal -->
                                            <div class="modal fade" id="categoryDelete-{{ $category->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $category->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $category->id }}">@lang('categories.delete_category') {{ $category->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h4>@lang('categories.delete_confirmation')</h4>
                                                        </div>
                                                        <form action="{{ route('adminCatDelete',[$category->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('categories.cancel')</button>
                                                                <button type="submit" class="btn btn-danger">@lang('categories.delete')</button>
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
         <!-- Categories DataTable-->
@endsection
