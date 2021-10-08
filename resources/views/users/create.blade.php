@extends('layouts.dashboard')

@section('title')
    {{ trans('users.title.create') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('create_users') }}
@endsection

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <!-- name -->
        <div class="form-group">
            <label for="input_user_name" class="font-weight-bold">
                {{ trans('users.form_control.input.name.label') }}
            </label>
            <input id="input_user_name" value="{{ old('name') }}" name="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="{{ trans('users.form_control.input.name.placeholder') }}"/>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- role -->
        <div class="form-group role-select">
            <label for="select_user_role" class="font-weight-bold">
                {{ trans('users.form_control.select.role.label') }}
            </label>
            <select id="select_user_role" name="role" data-placeholder="{{ trans('users.form_control.select.role.placeholder') }}" class="custom-select w-100 @error('role') is-invalid @enderror">
                @if(old('role'))
                    <option value="{{ old('role')->id }}" selected>{{ old('role')->name }}</option>
                @endif
            </select>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- email -->
        <div class="form-group">
            <label for="input_user_email" class="font-weight-bold">
                {{ trans('users.form_control.input.email.label') }}
            </label>
            <input id="input_user_email" value="{{ old('email') }}" name="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ trans('users.form_control.input.email.placeholder') }}"
                   autocomplete="email"/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- password -->
        <div class="form-group">
            <label for="input_user_password" class="font-weight-bold">
                {{ trans('users.form_control.input.password.label') }}
            </label>
            <input id="input_user_password" name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ trans('users.form_control.input.password.placeholder') }}"
                   autocomplete="new-password"/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- password_confirmation -->
        <div class="form-group">
            <label for="input_user_password_confirmation" class="font-weight-bold">
                {{ trans('users.form_control.input.password_confirmation.label') }}
            </label>
            <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                   class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ trans('users.form_control.input.password_confirmation.placeholder') }}"
                   autocomplete="new-password"/>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="float-right">
            <a class="btn btn-warning px-4 mx-2" href="">
                {{ trans('users.button.back.value') }}
            </a>
            <button type="submit" class="btn btn-primary float-right px-4">
                {{ trans('users.button.save.value') }}
            </button>
        </div>
    </form>
@endsection
@push('css-external')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/dist/js/i18n/'. app()->getLocale() .'.js') }}"></script>
@endpush

@push('css-internal')
    <style>
        .role-select .select2-container--bootstrap4 .select2-selection__clear {
            right: 15px;
            top: -10px;
            bottom: 10px;
            font-size: 23px;
            background-color: #007307;
            border-color: transparent;
        }

        .role-select .select2-container--bootstrap4 .select2-selection__clear span {
            color: #fff;
            right: 2px;
            position: absolute;
            bottom: -1px;
        }
    </style>
@endpush

@push('javascript-internal')
    <script>

        $(function () {
            // Select2 user roles
            $('#select_user_role').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 220,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
    </script>
@endpush
