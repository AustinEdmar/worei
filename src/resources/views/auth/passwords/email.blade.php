@extends('layouts.auth')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light" style="
               background: 
        linear-gradient(rgba(218, 0, 123, 0.8), rgba(218, 0, 123, 0.8)),
        url('../assets/img/close-up-women-hands-with-feminism-symbol.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        min-height: 100vh;">
    <div class="p-4  shadow rounded border border-2 shadow-sm bg-white" style="width: 100%; max-width: 380px;">
        <div class="text-center ">
            <a href="{{ route('login') }}">
                <img src="{{ asset('assets/img/worei-logo.png') }}" alt="Loginho" class="login-logo" style="width: 110px;">
            </a>
        </div>

        <h4 class="text-center">Reset Password</h4>
       

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label mb-1" style="font-size: 13px;">Email</label>
                <input id="email" type="email"
                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    style="height: 35px; font-size: 13px;">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

           

        

            <button type="submit" class="btn w-100 mb-2"
                style="font-size: 14px; font-weight: bold; height: 36px; background-color: rgb(154, 53, 255); color: white;">
                Reset Password
            </button>

           
        </form>
    </div>
</div>
@endsection
