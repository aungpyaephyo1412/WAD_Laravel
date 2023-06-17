@extends("layouts.master")
@section('title')
    Register
@endsection
@section('content')
    <form action="{{route('auth.store')}}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="name">Student Name</label>
            <input class="form-control @error('student_name') is-invalid @enderror" value="{{ old('student_name')}}"
                   type="text"
                   name="student_name" id="name">
            @error('student_name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
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
        <div class="mb-3">
            <label class="form-label" for="confirmPassword">Student Confirm Password</label>
            <input class="form-control  @error('student_confirmPassword') is-invalid @enderror"
                   type="password"
                   name="student_confirmPassword" id="confirmPassword">
            @error('student_confirmPassword')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="">
            you have alredy account in here <a href="{{route('auth.login')}}">login now</a>
        </div>
        <button class="btn btn-outline-primary">Register</button>
    </form>
@endsection
