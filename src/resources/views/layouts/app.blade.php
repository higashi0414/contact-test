<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FashionablyLate</title>

 <!-- Bootstrap CSS（CDN） -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css')
</head>

<body>
  <header class="header">
   <div class="header__logo-wrapper">
    <a class="header__logo" href="/">FashionablyLate</a>
   </div>

   <div class="header__nav">
    @guest
      @if (request()->is('register'))
        <a href="{{ route('login') }}" class="header__link">login</a>
      @elseif (request()->is('login'))
        <a href="{{ route('register') }}" class="header__link">register</a>
      @endif
    @else
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="header__link logout-button">logout</button>
      </form>
    @endguest
  </div>
</header>

  <main>
    @yield('content')
  </main>

  <!-- Bootstrap JavaScript（CDN） -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
