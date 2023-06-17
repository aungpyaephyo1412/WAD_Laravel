@extends('layouts.master')
@section('title')
    Verifying
@endsection
@section('content')

    <h4>Mail Verifying</h4>
    <form action="{{route('mail.verifying')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="text">Student Email</label>
            <input class="form-control @error('verify_code') is-invalid @enderror" value="{{ old('verify_code')}}"
                   type="text"
                   name="verify_code" id="text">
            @error('verify_code')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-outline-info w-100">Verify Now</button>
    </form>
@endsection
