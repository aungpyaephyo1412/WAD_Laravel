<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title','Laravel Application') </title>
    <link rel="stylesheet" href="{{@asset("css/bootstrap.min.css")}}">
</head>
<body>
<section class="bg-light container-fluid min-vh-100">
    <div class="row">
        <div class="col-12">
            @include("layouts.header")
        </div>
        <div class="col-12 col-md-3">
            @include("layouts.navbar")
        </div>
        <div class="col-12 col-md-9">
            @user
              @if(is_null(session('auth')->email_verified_at))
                Verify your account <a href="{{route('mail.verify')}}" class="alert-link">link</a>
              @endif
            @enduser
            @yield("content")
        </div>
    </div>
</section>
<script src="{{"js/bootstrap.bundle.min.js"}}"></script>
</body>
</html>
