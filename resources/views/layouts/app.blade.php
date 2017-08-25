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
    <link rel="stylesheet" href="{{ asset('css/tokenize2.min.css') }}">
</head>
<body>
    <div id="app">
      @include('inc.navbar')
      <div id="wrapper" class="">
          <div id="sidebar-wrapper">
            <div class="sidebar-inner">
              <div class="sidebar_title">
                <h4>Search Recipe by Ingredient</h4>
              </div>

              @include('autocomplete')

            </div>
        </div>

        <div id="page-content-wrapper">

            @yield('content')

        </div>
      </div>

      <!-- <footer class="footer text-center">
        <p>Copyright 2017 &copy </p>
      </footer> -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('tokenize2.js') }}"></script> -->
</body>
</html>
