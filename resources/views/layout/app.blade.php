<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> {{!empty($header_title) ? $header_title : '' }} - SFI</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ url('/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ url('/plugins/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>

    <div class="main-wrapper">

        @include('layout.header')



        @yield('content')



    </div>


    <script src="{{ url('/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ url('/js/script.js') }}"></script>
</body>

</html>
