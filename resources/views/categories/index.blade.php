@extends('layouts.dashboard')

@section('title')
    {{ trans('categories.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('categories') }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            @can('category_create')
                <a href="{{ route('categories.create') }}" class="btn btn-primary" role="button">
                    {{ trans('categories.button.create.value') }}
                    <i class="fa fa-plus-square"></i>
                </a>
            @endcan
        </div>
        <div class="col-md-6">
            {{--Form: Search--}}
            <form action="{{ route('categories.index') }}" method="GET" class="float-right">
                <div class="input-group">
                    <input name="keyword" type="search" value="{{ request()->get('keyword') }}" class="form-control" placeholder="{{ trans('categories.form_control.input.search.placeholder') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="table-responsive category-list">
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('categories.table_list.title') }}</th>
                <th style="width: 9%" class="text-right">{{ trans('categories.table_list.action') }}</th>
            </tr>
            </thead>
            <tbody>
                @if(count($categories))
                    @include('categories._category-list', [
                        'categories'    =>  $categories,
                        'count'         =>  0
                    ])
                @else
                    <tr>
                        <td>
                            @if(request()->get('keyword'))
                                {{ trans('categories.label.no_data.search', ['keyword'=>request()->get('keyword')]) }}
                            @else
                                {{ trans('categories.label.no_data.fetch') }}
                            @endif
                        </td>
                        <td></td>
                    </tr>

                @endif
            </tbody>
        </table>
    </div>
    @if($categories->hasPages())
        <hr>
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    @endif

@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function(){
            //Event delete category
            $("form[role='alert']").submit(function(event){
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            });
        });
    </script>

@endpush
