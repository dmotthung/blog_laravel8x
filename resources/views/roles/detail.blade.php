@extends('layouts.dashboard')

@section('title')
    {{ trans('roles.title.detail') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('detail_roles', $role) }}
@endsection

@section('content')
    <div class="form-group">
        <label for="input_role_name" class="font-weight-bold">
            {{ trans('roles.form_control.input.name.label') }}
        </label>
        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly/>
    </div>
    <!-- permission -->
    <div class="form-group">
        <label for="input_role_permission" class="font-weight-bold">
            {{ trans('roles.form_control.input.permission.label') }}
        </label>
        <div class="row">
            <!-- list manage name:start -->
            @forelse($authorities as $managerName  =>  $permissions)
                <ul class="list-group mx-3">
                    <li class="list-group-item bg-dark text-white">
                        {{ trans("permissions.{$managerName}") }}
                    </li>
                    <!-- list permission:start -->
                    @foreach($permissions as $permission)
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       value="" onclick="return false;"
                                        {{ in_array($permission, $rolePermissions) ? 'checked' : null }} >
                                <label class="form-check-label">
                                    {{ trans("permissions.{$permission}") }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @empty
                <p>
                    <strong>
                        {{ trans('roles.label.no_data.fetch') }}
                    </strong>
                </p>
            @endforelse

        </div>
    </div>
    <!-- button  -->
    <div class="d-flex justify-content-end">
        <a href="{{ route('roles.index') }}" class="btn btn-primary mx-1" role="button">
            {{trans('roles.button.back.value')}}
        </a>
    </div>
@endsection
