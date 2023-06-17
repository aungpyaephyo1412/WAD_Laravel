@extends('layouts.master')
@section('title') Login @endsection
@section('content')
    @if( session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form action="{{route('auth.check')}}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="email">Student Email</label>
            <input class="form-control @error('student_email') is-invalid @enderror" value="{{ old('student_email')}}"
                   type="email"
                   name="student_email" id="email">
            @error('student_email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Student Password</label>
            <input class="form-control  @error('student_password') is-invalid @enderror"
                   type="password"
                   name="student_password" id="password">
            @error('student_password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="">
            new user in here <a href="{{route('auth.register')}}">register now</a>
        </div>
        <button class="btn btn-outline-primary">Login</button>
        <a href="{{route('auth.forgot')}}">Forget password?</a>
    </form>

@endsection
