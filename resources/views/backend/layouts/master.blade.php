<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Quiz App') }} | @yield('title')</title>
        <link type="text/css" href="{{ asset('edmin/code/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('edmin/code/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('edmin/code/css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('edmin/code/images/icons/css/font-awesome.css') }}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
    @include('backend.layouts.navbar')
    @include('backend.layouts.sidebar')

        @yield('content')

    @include('backend.layouts.footer')

    <script src="{{ asset('edmin/code/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('edmin/code/scripts/common.js') }}" type="text/javascript"></script>

    </body>
</html>

