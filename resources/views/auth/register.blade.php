@extends('auth.main')


@section('content')
<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Sign in to continue.</h6>
<form class="pt-3" method="POST" action="{{ route('register') }}">

    @csrf


    <div class="form-group">
        <input type="text"  name="user_name" class="form-control form-control-lg @error('user_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="User Name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                    @error('user_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
            <div class="form-group">
                <input type="text"  name="full_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Full Name" value="{{ old('full_name') }}" required autocomplete="last_name" autofocus>
                            @error('full_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>

                    <div class="form-group">
                        <input type="text"  name="contact_number" class="form-control form-control-lg @error('contact_number') is-invalid @enderror" id="exampleInputEmail1" placeholder="Contact Number" value="{{ old('contact_number') }}" required autocomplete="last_name" autofocus>
                                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>

    <div class="form-group">
    <input type="email"  name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>
                <div class="form-group">
                    <input placeholder="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <input placeholder="confirm password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Register</button>
            </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input"> Keep me signed in </label>
            </div>
    @if (Route::has('password.request'))
    <a class="auth-link text-black" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
@endif
    </div>

</form>

@endsection
