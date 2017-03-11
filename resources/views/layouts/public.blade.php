<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
  </head>
  <body>
    @yield('header')
    <main class="container">
      @yield('content')
    </main>
    @yield('footer')
  </body>
</html>
