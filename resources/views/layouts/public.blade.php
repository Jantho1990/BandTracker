<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>

    <!-- Stylesheets -->
    @include('partials._stylesheets')

    <!-- Header Scripts -->
    @include('partials._headerscripts')

  </head>
  <body>
    @yield('header')
    <main class="container">
      @yield('content')
    </main>
    @yield('footer')

    <!-- Footer Scripts -->
    @include('partials._footerscripts')

  </body>
</html>
