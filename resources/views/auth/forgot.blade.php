@extends('layouts.master')
@section('title')
    Forget Password
@endsection
@section('content')

    <h4>Reset Password</h4>
    <form action="{{route('auth.checkEmail')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Student Email</label>
            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}"
                   type="email"
                   name="email" id="email">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-outline-info w-100">Reset Password</button>
    </form>
@endsection
