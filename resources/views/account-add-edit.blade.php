@extends('layouts.app')


@section('content')



<h4>{{$user?'Edit':'Add'}} User</h4>
<form class="pt-3" method="POST" action="{{$user?route('users.update',$user):route('users.store')}}">

    @csrf
   @if ($user)
   @method('PUT')
   @else
   @method('POST')

   @endif

    <div class="form-group">
        <input type="text"  name="user_name" class="form-control form-control-lg @error('user_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="User Name" value="{{ $user?$user->user_name:'' }}" required autocomplete="user_name" autofocus>
                    @error('user_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
            <div class="form-group">
                <input type="text"  name="full_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Full Name" value="{{ $user?$user->full_name:'' }}" required autocomplete="full_name" autofocus>
                            @error('full_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>

                    <div class="form-group">
                        <input type="text"  name="contact_number" class="form-control form-control-lg @error('contact_number') is-invalid @enderror" id="exampleInputEmail1" placeholder="Contact Number" value="{{ $user?$user->contact_number:''}}" required autocomplete="contact_number" autofocus>
                                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>

    <div class="form-group">
    <input type="email"  name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" value="{{ $user?$user->email:'' }}" required autocomplete="email" autofocus>
                @error('email')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>
                <div class="form-group">
                    <input placeholder="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
                @if(!$user)
                <div class="form-group">
                    <input placeholder="confirm password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                </div>
                @endif

            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{$user?'Update':'Save'}}</button>
            </div>


</form>

@endsection
