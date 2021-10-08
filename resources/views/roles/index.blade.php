@extends('layouts.dashboard')

@section('title')
    {{ trans('roles.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            @can('role_create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary" role="button">
                    {{ trans('roles.button.create.value') }}
                    <i class="fa fa-plus-square"></i>
                </a>
            @endcan
        </div>
        <div class="col-md-3">
            <form action="{{ route('roles.index') }}" method="GET">
                <div class="input-group">
                    <input name="keyword" type="search" value="{{ request()->get('keyword') }}" class="form-control"
                           placeholder="{{ trans('roles.form_control.input.search.placeholder') }}">
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
                <th>{{ trans('roles.title.index') }}</th>
                <th style="width: 9%" class="text-right">{{ trans('roles.title.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(count($roles))
                @include('roles._role-list', ['roles'    =>  $roles])
            @else
                <tr>
                    <td>
                        @if(request()->get('keyword'))
                            {{ trans('roles.label.no_data.search', ['keyword'=>request()->get('keyword')]) }}
                        @else
                            {{ trans('roles.label.no_data.fetch') }}
                        @endif
                    </td>
                    <td></td>
                </tr>

            @endif
            </tbody>
        </table>
    </div>
    @if($roles->hasPages())
        <hr>
        {{ $roles->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection
@push('javascript-internal')
    <script>
        $(document).ready(function () {
            // Event: Delete Roles
            $("form[role='alert']").submit(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('roles.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('roles.button.delete.value') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush
