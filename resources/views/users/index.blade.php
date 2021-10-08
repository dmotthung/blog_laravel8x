@extends('layouts.dashboard')

@section('title')
    {{ trans('users.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            @can('user_create')
                <a href="{{ route('users.create') }}" class="btn btn-primary" role="button">
                    {{ trans('users.title.create') }}
                    <i class="fa fa-plus-square"></i>
                </a>
            @endcan
        </div>
        <div class="col-md-3">
            <form action="" method="GET">
                <div class="input-group">
                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control"
                           placeholder="{{ trans('users.form_control.input.search.placeholder') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row users">
        @forelse($users as $user)
            <div class="col-md-4">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-id-badge fa-5x"></i>
                            </div>
                            <div class="col-md-10">
                                <table>
                                    <tr>
                                        <th>
                                            {{ trans('users.label.name') }}
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('users.label.email') }}
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('users.label.role') }}
                                        </th>
                                        <td>:</td>
                                        <td>
                                            {{ $user->roles->first()->name }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="float-right">
                            <!-- edit -->
                            @can('user_update')
                                <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-primary"
                                   role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan

                            @can('user_delete')
                            <!-- delete -->
                                <form action="{{ route('users.destroy', ['user'=>$user]) }}" method="post" role="alert"
                                      class="d-inline"
                                      alert-title="{{ trans('users.alert.delete.title') }}"
                                      alert-text="{{ trans('users.alert.delete.message.confirm',['name' => $user->name]) }}"
                                      alert-btn-cancel="{{ trans('users.button.cancel.value') }}"
                                      alert-btn-yes="{{ trans('users.button.delete.value') }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="mx-3 my-2">
                <strong>
                    @if(request()->get('keyword'))
                        {{ trans('users.label.no_data.search', ['keyword'=>request()->get('keyword')]) }}
                    @else
                        {{trans('users.label.no_data.fetch')}}
                    @endif
                </strong>
            </p>
        @endforelse
    </div>
    {{--Todo:paginate--}}
    @if($users->hasPages())
        <hr>
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection
@push('css-internal')
    <style>
        .users tr td:last-child {
            padding-left: 5px;
        }
    </style>
@endpush
@push('javascript-internal')
    <script>
        $(document).ready(function () {
            // Event: Delete Users
            $("form[role='alert']").submit(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('users.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('users.button.delete.value') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush
