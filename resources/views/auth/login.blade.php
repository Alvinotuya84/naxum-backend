@extends('auth.main')

@section('content')


        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">

            @csrf

            <div class="form-group">
            <input type="email"  name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                    </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                        <label class="form-check-label text-muted">
                    </div>
            {{-- @if (Route::has('password.request'))
            <a class="auth-link text-black" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif --}}
            </div>

    </form>





@endsection
