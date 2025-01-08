<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tag
  -->
  <title>EcoMarket</title>
  <meta name="title" content="EcoMarket - EcoMarket">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="{{ asset('user-source/css/Homepage.css') }}">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap"
    rel="stylesheet">

  <!-- Preload images -->
  <link rel="preload" as="image" href="{{ asset('assets/images/Backgroung-Atas.jpg') }}">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
        <ion-icon name="close-outline" aria-label="true" class="close-icon"></ion-icon>
      </button>

      <a href="{{ url('/indexuser') }}" class="logo">EcoMarket</a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="{{ url('/indexuser') }}" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="{{ url('/shop') }}" class="navbar-link" data-nav-link>Shop</a>
          </li>

          <li class="navbar-item">
            <a href="{{ url('/about') }}" class="navbar-link" data-nav-link>Tentang Kami</a>
          </li>

          <li class="navbar-item">
            <a href="{{ url('/affiliate') }}" class="navbar-link" data-nav-link>Affiliate</a>
          </li>

          <li class="navbar-item">
            <a href="{{ url('/faq') }}" class="navbar-link" data-nav-link>FAQ</a>
          </li>
          <li class="navbar-item">
            <a href="{{ url('/privacy') }}" class="navbar-link" data-nav-link>Kebijakan Privasi</a>
          </li>
        </ul>


        {{-- <a href="#" class="navbar-action-btn">Log In</a> --}}
      </nav>



      <div class="header-actions">
        @if(auth()->check())
      <a href="{{ url('/cart') }}" class="action-btn" aria-label="cart">
        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
      </a>
    @else
    <a href="{{ route('user.login') }}" class="action-btn" aria-label="cart">
      <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
    </a>
  @endif

        @if(auth()->check())
      <a href="{{ url('/profile') }}" class="action-btn" aria-label="profile">
        <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
      </a>
    @else
    <a href="{{ route('user.login') }}" class="action-btn" aria-label="profile">
      <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
    </a>
  @endif
        <!-- <a href="favorite.html" class="action-btn favorite" aria-label="Favorite">
          <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
        </a> -->
      </div>

    </div>
  </header>

  <main>
    <article>

      <!-- HERO -->
      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('{{ asset('user-source/images/bg-6.jpeg') }}')">
        <div class="container">
          <h1 class="h1 hero-title">
            <span class="span">Soulusi Lengkap Kebutuhan Pokok Anda.</span>
            <span class="span">Segar, Berkualitas</span>
            <span class="span">Ramah lingkungan.</span>
          </h1>
        </div>
      </section>

      <!-- Makanan Kucing Favorit -->
      <section class="section product" id="shop" aria-label="product">
        <div class="container">
          <h2 class="h2 section-title">
            <span class="span">Makanan </span>
          </h2>

          <ul class="grid-list">
            @foreach ($bahanpokok as $item)
        <li>
          <div class="product-card">
          <div class="card-banner img-holder" style="--width: 360; --height: 360;">
            <img src="{{ asset('storage/' . $item->image_url) }}" width="360" height="360" loading="lazy"
            alt="{{ $item->name }}" class="img-cover default">
          </div>
          <div class="card-content">
            <h3 class="h3">
            <a href="#" class="card-title">{{ $item->name }}</a>
            </h3>
            <data class="card-price"
            value="{{ $item->price }}">RP.{{ number_format($item->price, 0, ',', '.') }}</data>
          </div>
          </div>
        </li>
      @endforeach
          </ul>
        </div>
      </section>

    </article>
  </main>

  <script>
    document.querySelectorAll('.love-btn').forEach(button => {
      button.addEventListener('click', function () {
        this.classList.toggle('active'); // Toggel class active saat tombol ditekan
      });
    });
  </script>




  <!-- 
    - #FOOTER
  -->

  <footer class="footer" style="background-image: url('{{ asset('user-source/images/footer-bg.jpg') }}')">
    <div class="footer-top section">
      <div class="container">
        <div class="footer-brand">
          <a href="#" class="logo">EcoMarket</a>
          <p class="footer-text">
            Jika ada pertanyaan, Silahkan Hubungi Kami <a href="mailto:ecomarket@gmail.com"
              class="link">ecomarket@gmail.com</a>
          </p>
          <ul class="contact-list">
            <li class="contact-item">
              <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
              <address class="address">
                Yogyakarta, Indonesia
              </address>
            </li>
            <li class="contact-item">
              <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
              <a href="tel:082112387637" class="contact-link">082112387637</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          &copy; 2024 Made with Kelompok Ecommerce <a href="#" class="copyright-link">EcoMarket.</a>
        </p>
      </div>
    </div>
  </footer>




  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>

  <!-- 
    - custom js link
  -->
  <script src="{{ asset('user-source/js/script.js') }}" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>