<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag -->
    <title>Affiliate Program</title>
    <meta name="title" content="Affiliate Program - EcoMarket">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="{{ asset('user-source/css/detail.css') }}">

    <!-- Google Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Preload Images -->
    <link rel="preload" as="image" href="{{ asset('user-source/images/Backgroung-Atas.jpg') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom CSS for Affiliate Page -->
    <style>
        .affiliate-section {
            padding: 60px 20px;
            background: linear-gradient(135deg, #f9f9f9, #e3f2fd);
            text-align: center;
        }

        .affiliate-section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 40px;
            animation: fadeInDown 1s ease-in-out;
        }

        .affiliate-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 1s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.5rem;
            color: #007bff;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        .card ul {
            list-style: none;
            padding: 0;
        }

        .card ul li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .card ul li::before {
            content: "✔";
            color: #007bff;
            margin-right: 10px;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .cta-button:hover {
            background: #0056b3;
        }

        .illustration {
            margin-top: 40px;
            max-width: 100%;
            height: auto;
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>

<body id="top">

    <!-- Header Section -->
    <header class="header" data-header>
        <div class="container">
            <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria -hidden="true" class="menu-icon"></ion-icon>
                <ion-icon name="close-outline" aria-label="true" class="close-icon"></ion-icon>
            </button>

            <a href="{{ url('/indexuser') }}" class="logo">EcoMarket</a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
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

                </ul>
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
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main>
        <section class="affiliate-section">
            <h2>Program Affiliate EcoMarket</h2>
            <div class="affiliate-container">
                <div class="card">
                    <h3>Apa Itu Program Affiliate?</h3>
                    <p>
                        Program Affiliate EcoMarket adalah program yang memungkinkan Anda untuk mendapatkan komisi
                        dengan
                        cara mempromosikan produk-produk kami. Setiap kali seseorang membeli produk melalui link
                        afiliasi Anda, Anda akan mendapatkan komisi.
                    </p>
                    <a href="{{ route('affiliate.login') }}" class="cta-button" data-nav-link>Daftar Sekarang</a>
                </div>

                <div class="card">
                    <h3>Bagaimana Cara Bergabung?</h3>
                    <p>
                        Bergabung dengan program affiliate kami sangat mudah. Ikuti langkah-langkah berikut:
                    </p>
                    <ul>
                        <li>Daftar di halaman pendaftaran affiliate.</li>
                        <li>Setelah pendaftaran disetujui, Anda akan menerima link afiliasi unik.</li>
                        <li>Promosikan link tersebut di media sosial, blog, atau website Anda.</li>
                        <li>Mulai dapatkan komisi dari setiap penjualan yang dilakukan melalui link Anda.</li>
                    </ul>
                    <a href="{{ route('affiliate.login') }}" class="cta-button" data-nav-link>Bergabung Sekarang</a>
                </div>

                <div class="card">
                    <h3>Manfaat Bergabung</h3>
                    <p>
                        Dengan bergabung dalam program affiliate kami, Anda akan mendapatkan berbagai manfaat, antara
                        lain:
                    </p>
                    <ul>
                        <li>Komisi menarik dari setiap penjualan.</li>
                        <li>Akses ke materi promosi dan dukungan dari tim kami.</li>
                        <li>Peluang untuk meningkatkan penghasilan Anda secara online.</li>
                    </ul>
                    <a href="{{ route('affiliate.login') }}" class="cta-button" data-nav-link>Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <img src="{{ asset('user-source/images/bg-4.png') }}" alt="Affiliate Illustration" class="illustration">
        </section>
    </main>

    <!-- Footer Section -->
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

    <!-- Custom JS Link -->
    <script src="{{ asset('user-source/js/script.js') }}" defer></script>

    <!-- Ionicon Link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>