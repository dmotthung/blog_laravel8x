@extends('layouts.auth')

@section('title')
    Login Top10SaiThanh
@endsection

@section('content')
        <form method="POST" action="{{ route('login') }}" class="mt-5 mb-5 login-input" autocomplete="off">
            @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
        <button class="btn login-form__btn submit w-100">Sign In</button>
    </form>
    <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
@endsection
