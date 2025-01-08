<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag -->
    <title>Kebijakan Privasi - EcoMarket</title>
    <meta name="title" content="Kebijakan Privasi - EcoMarket">

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

    <!-- Custom CSS for Privacy Policy Page -->
    <style>
        .privacy-section {
            padding: 60px 20px;
            background: linear-gradient(135deg, #f9f9f9, #e3f2fd);
            text-align: center;
        }

        .privacy-section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 40px;
            animation: fadeInDown 1s ease-in-out;
        }

        .privacy-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
        }

        .privacy-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 1s ease-in-out;
        }

        .privacy-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .privacy-item h3 {
            font-size: 1.5rem;
            color: #007bff;
            margin-bottom: 15px;
        }

        .privacy-item p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        .privacy-item ul {
            list-style: none;
            padding: 0;
        }

        .privacy-item ul li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .privacy-item ul li::before {
            content: "✔";
            color: #007bff;
            margin-right: 10px;
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
        <section class="privacy-section">
            <h2>Kebijakan Privasi</h2>
            <div class="privacy-container">
                <div class="privacy-item">
                    <h3>Informasi yang Kami Kumpulkan</h3>
                    <p>
                        Kami mengumpulkan informasi yang Anda berikan saat mendaftar, melakukan pemesanan, atau
                        berinteraksi dengan layanan kami. Ini termasuk nama, alamat email, alamat pengiriman, dan
                        informasi pembayaran.
                    </p>
                </div>

                <div class="privacy-item">
                    <h3>Penggunaan Informasi</h3>
                    <p>
                        Informasi yang kami kumpulkan digunakan untuk memproses pesanan Anda, meningkatkan layanan kami,
                        dan menghubungi Anda dengan informasi terkait pesanan atau promosi.
                    </p>
                </div>

                <div class="privacy-item">
                    <h3>Keamanan Informasi</h3>
                    <p>
                        Kami berkomitmen untuk melindungi informasi pribadi Anda. Kami menggunakan berbagai langkah
                        keamanan untuk menjaga informasi Anda tetap aman.
                    </p>
                </div>

                <div class="privacy-item">
                    <h3>Cookies</h3>
                    <p>
                        Kami menggunakan cookies untuk meningkatkan pengalaman pengguna di situs kami. Anda dapat
                        mengatur browser Anda untuk menolak cookies, tetapi ini dapat mempengaruhi fungsi situs.
                    </p>
                </div>

                <div class="privacy-item">
                    <h3>Perubahan Kebijakan</h3>
                    <p>
                        Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Kami akan memberi tahu Anda
                        tentang perubahan tersebut melalui email atau melalui pemberitahuan di situs kami.
                    </p>
                </div>
            </div>

        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer" style="background-image: url('{{ asset('user-source/images/footer-bg.jpg') }}')">
        <div class="footer-top section">
            <div class="container">
                <div class="footer-brand">
                    <a href="#" class="logo">EcoMarket</a>
                    <p class="footer-text">
                        Jika ada pertanyaan, silahkan hubungi kami
                        <a href="mailto:ecomarket@gmail.com" class="link">ecomarket@gmail.com</a>
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
                    &copy; 2024 Made with Kelompok Ecommerce
                    <a href="#" class="copyright-link">EcoMarket.</a>
                </p>
            </div>
        </div>
    </footer>
    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    <!-- Custom JS Link -->
    <script src="{{ asset('user-source/js/script.js') }}" defer></script>

    <!-- Ionicon Link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>