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

<div class="mt-3 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                @include('partials.sidebar')
            </div>
            <div class="col-sm-9">
                @yield('content')
            </div>
        </div>
    </div>



</div>

<script src="{{url('bst/js/jquery.js')}}"></script>
<script src="{{url('bst/js/bootstrap.js')}}"></script>
</body>
</html>
