<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::to('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{UrL::to('/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::to('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('/css/styles.css') }}">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/scripts.js"></script>
     <script>
              new WOW().init();
    </script>
    <title>ahmed</title>
</head>
<body>
@include('layouts.nav')
<div class="container">
    @yield('content')
</div>
@yield('scripts')
</body>
</html>