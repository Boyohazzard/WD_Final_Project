@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<html>
  <head>
    <title>{{ $title ?? 'Final Project' }}</title>
  </head>
  <body>
    <nav>
      <h3>Welcome to product site, a place for all your product needs</h3>
      <hr>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">MyShop</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/cart') }}">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/orders') }}">Orders</a>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @else
          <li class="nav-item">
            <span class="nav-link">Hi, {{ Auth::user()->name }}</span>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="nav-link btn btn-link" type="submit">Logout</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

    {{ $slot }}
    <footer>
      <hr />
      © 2026 future.com
    </footer>
  </body>
</html>