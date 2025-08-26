<html>
  <head>
    <title>{{ $title ?? 'Final Project' }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>
    <nav>
      <h3>Welcome to product site, a place for all your product needs</h3>
      <hr>
    </nav>
    {{ $slot }}
    <footer>
      <hr />
      © 2026 future.com
    </footer>
  </body>
</html>