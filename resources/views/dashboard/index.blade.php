@extends('layouts.dashboard')

@section('title')
    {{ trans('dashboard.title.index') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard_home') }}
@endsection

@section('content')
    <h4>{{ trans('dashboard.greeting.welcome',['name' => Auth::user()->name]) }}</h4>
@endsection

