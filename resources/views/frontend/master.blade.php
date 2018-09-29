<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Survey application">
    <meta name="author" content="Tassos Kolydas, http://www.kolydart.gr">

    <title>{{ config('app.name') }}</title>

    {{-- <link rel="icon" href="/favicon.ico"> --}}
    {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" > --}}
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}

    <!-- Bootstrap CSS -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    {{-- font-awesome --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/js/jquery-1.12.4.min.js"></script>

    @yield('head','')

    <link rel="stylesheet" href="/css/custom.css"> 
    
  </head>

  <body @if (!Auth::check()) class="bg-dark" @endif>
    <div id="app">

      @yield('menu','')

      <div class="container">

          @include('partials.messages')

          @yield('content')

      </div>  
      
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>