<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('my_title')</title>
    <link href="{{url('bst/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>

@include("partials.navbar")

<div class=" mb-5">
    @yield('content')
</div>

<script src="{{url('bst/js/jquery.js')}}"></script>
<script src="{{url('bst/js/bootstrap.js')}}"></script>
</body>
</html>

