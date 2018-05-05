<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    </head>

    <body>
        
        @extends('inc.sidenav')

        <div id="app">
            @extends('inc.topnav')
            
        </div>
        
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{asset('js/toastr.min.js')}}"></script>

            <script>
                @if(Session::has('success'))
                    toastr.success("{{Session::get('success')}}")
                @endif

                @if(Session::has('info'))
                    toastr.info("{{Session::get('info')}}")
                @endif
            </script>
     </body>
</html>