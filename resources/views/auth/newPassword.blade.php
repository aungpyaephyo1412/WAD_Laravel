@extends('layouts.master')
@section('title') Change New Password @endsection
@section('content')
    @if( session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form action="{{route('auth.resetPassword')}}" method="post">
        @csrf()
        <input type="hidden" name="user_token" value="{{$user_token}}">
{{--        <div class="mb-3">--}}
{{--            <label class="form-label" for="current_password">Current Password</label>--}}
{{--            <input class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password')}}"--}}
{{--                   type="password"--}}
{{--                   name="current_password" id="current_password">--}}
{{--            @error('current_password')--}}
{{--            <div class="invalid-feedback">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
        <div class="mb-3">
            <label class="form-label" for="password">New Password</label>
            <input class="form-control  @error('password') is-invalid @enderror"
                   type="password"
                   name="password" id="password">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password_confirmation">New Confirm Password</label>
            <input class="form-control  @error('password_confirmation') is-invalid @enderror"
                   type="password"
                   name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-outline-primary">Change Password</button>
    </form>

@endsection
