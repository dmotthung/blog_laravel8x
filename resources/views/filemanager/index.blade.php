@extends('layouts.dashboard')

@section('title')
    {{ trans('filemanager.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('file_manager') }}
@endsection

@section('content')
    <div class="file-manager justify-content-end">
        <form action="" method="GET" style="width: 200px">
            <div class="input-group">
                <select name="type" class="custom-select">
                    @foreach($types as $value => $label)
                        <option value="{{ $value }}" {{ $typeSelected == $value ? 'selected' : null }}>{{ $label }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        {{ trans('filemanager.button.apply.value') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <iframe src="{{route('unisharp.lfm.show')}}?type={{ $typeSelected }}"
            style="width: 100%; height: 600px; overflow: hidden; border: none; padding-top: 15px"></iframe>
@endsection

@push('css-internal')
    <style>
        .file-manager .custom-select {
            height: calc(2.0625rem + 4px);
        }
    </style>
@endpush
