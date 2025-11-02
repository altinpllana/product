<!doctype html>
<html lang="en" x-data>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Showcase • Adventure Wedding</title>
  <meta name="description" content="Minimal product showcase built with Blade, SCSS, Alpine.js, and Vue.">
  <link rel="icon" href="data:,">
  <style>
    [x-cloak] {
      display: none !important
    }
  </style>
  @vite(['resources/scss/app.scss','resources/js/app.js'])
</head>

<body class="min-h-screen bg-sand-50 text-stone-900">
  <header class="site-header">
    <nav class="nav" x-data="{open:false}">
      <a href="{{ route('products.index') }}" class="logo" aria-label="Adventure Wedding">
        <svg width="28" height="28" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M3 17l6-10 4 7 3-5 5 8H3z" fill="currentColor" />
        </svg>
        <span>Adventure Wedding</span>
      </a>
      <button class="hamburger" @click="open=!open" :aria-expanded="open.toString()" aria-controls="primary-nav" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </button>
      <ul id="primary-nav" class="links" :class="{'open':open}" x-cloak>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Products</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main class="container" role="main">
    @yield('content')
  </main>

  <footer class="site-footer" id="contact">
    <div class="footer-inner">
      <p>© {{ now()->year }} Adventure Wedding</p>
      <div class="social" aria-label="Social media">
        <a href="#" aria-label="Instagram" class="icon" rel="noopener">
          <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5z" />
            <path d="M12 7.5A4.5 4.5 0 1 1 7.5 12 4.51 4.51 0 0 1 12 7.5z" />
            <circle cx="17.5" cy="6.5" r="1.25" />
          </svg>
        </a>
        <a href="#" aria-label="X" class="icon" rel="noopener">
          <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M3 3h3.6l5.2 6.9L16.8 3H21l-7.2 9.4L21 21h-3.6l-5.5-7.3L7.2 21H3l7.6-10L3 3z" />
          </svg>
        </a>
        <a href="#" aria-label="YouTube" class="icon" rel="noopener">
          <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M23 8.2a4 4 0 0 0-2.8-2.8C18 5 12 5 12 5s-6 0-8.2.4A4 4 0 0 0 1 8.2 41.2 41.2 0 0 0 .6 12 41.2 41.2 0 0 0 1 15.8a4 4 0 0 0 2.8 2.8C6 19 12 19 12 19s6 0 8.2-.4A4 4 0 0 0 23 15.8 41.2 41.2 0 0 0 23.4 12 41.2 41.2 0 0 0 23 8.2z" />
            <path d="M10 15.2V8.8L15.5 12 10 15.2z" fill="#fff" />
          </svg>
        </a>
      </div>
    </div>
  </footer>
</body>

</html>