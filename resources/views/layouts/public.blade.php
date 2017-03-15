<!DOCTYPE html>
<html>
  <head>
    @include('partials._head')

  </head>
  <body>
    @include('partials._header')
    @include('partials._message')
    <main class="container-fluid">
      @yield('content')
    </main>
    @include('partials._footer')

    <!-- Footer Scripts -->
    @include('partials._footerscripts')

  </body>
</html>
