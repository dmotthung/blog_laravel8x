@extends('layouts.dashboard')

@section('title')
    {{ trans('posts.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('posts') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            {{--add new post--}}
            @can('post_create')
                <a href="{{ route('posts.create') }}" class="btn btn-primary" role="button">
                    {{ trans('posts.button.create.value') }}
                    <i class="fa fa-plus-square"></i>
                </a>
            @endcan
        </div>

        <div class="col-md-6">
            <form action="" method="GET" class="form-inline form-row">
                {{--Filter Status--}}
                <div class="col">
                    <div class="input-group mx-1 search-post">

                        <select name="status" class="custom-select">
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ $statusSelected == $value ? 'selected' : null }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary"
                                    type="submit">{{ trans('posts.button.search.value') }}</button>
                        </div>
                    </div>
                </div>
                {{--Filter Search--}}
                <div class="col">
                    <div class="input-group mx-1 search-post">
                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control"
                               placeholder="{{ trans('posts.form_control.input.search.placeholder') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
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
                <th>{{ trans('posts.table_list.title') }}</th>
                <th>{{ trans('posts.table_list.status') }}</th>
                <th>{{ trans('posts.table_list.action') }}</th>
                <th class="text-right">{{ trans('posts.table_list.created_at') }} / {{ trans('posts.table_list.updated_at') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(count($posts))
                @include('posts._post-list', ['posts'    =>  $posts])
            @else
                <tr>
                    <td>
                        @if(request()->get('keyword'))
                            {{ trans('posts.label.no_data.search', ['keyword'=>request()->get('keyword')]) }}
                        @else
                            {{ trans('posts.label.no_data.fetch') }}
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            @endif
            </tbody>
        </table>
    </div>
    @if($posts->hasPages())
        <hr>
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    @endif

@endsection
@push('css-internal')
    <style>
        .label-primary {
            background-color: #007307;
            border-color: #007307;
        }

        .search-post .custom-select {
            height: calc(2.0625rem + 4px);
        }

        .search-post .form-control {
            height: 0px;
        }
    </style>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function () {
            // Event: Delete Tags
            $("form[role='alert']").submit(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('tags.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('tags.button.delete.value') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush
