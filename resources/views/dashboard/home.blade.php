@extends("layouts.master")
@section('title')
    Dashobard
@endsection
@section('content')
    <div class="">
        {{ session('auth')->name}}
    </div>
    <a href="{{route('auth.passwordChange')}}">Change Password</a>
    <form action="{{route('auth.logout')}}" method="post">
        @csrf
        <button class="btn btn-info">Log Out</button>
    </form>
@endsection
