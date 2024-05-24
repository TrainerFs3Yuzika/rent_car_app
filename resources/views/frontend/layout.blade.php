<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rental Mobil Surabaya</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
  </head>

  <body>
    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3">
              <div class="site-logo">
                <h1><a href="{{ url('/') }}"><strong>Rent car Surabaya</strong></a></h1>
                
              </div>
            </div>

            <div class="col-9 text-right">
              <span class="d-inline-block d-lg-none"
                ><a href="#" class="site-menu-toggle js-menu-toggle py-5"
                  ><span class="icon-menu h3 text-black"></span></a
              ></span>

              <nav
                class="site-navigation text-right ml-auto d-none d-lg-block"
                role="navigation"
              >
                <ul class="site-menu main-menu js-clone-nav ml-auto">
                  <li class="active">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                  </li>
                  <li><a href="{{ url('daftar-mobil') }}" class="nav-link">Daftar Mobil</a></li>
                  </li>
                  <li><a href="{{ url('blog') }}" class="nav-link">Blog</a></li>
                  <li><a href="{{ url('tentang-kami') }}" class="nav-link">Tentang Kami</a></li>
                  <li><a href="{{ url('kontak') }}" class="nav-link">Kontak</a></li>
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
                
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      @yield('content')

      <div class="site-section bg-secondary py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-md-0">
              <h2 class="mb-0 text-white">Apa yang kalian tunggu ?</h2>
              <p class="mb-0 opa-7">
                Buruan sewa mobil sekarang sebelum harga bbm naik
              </p>
            </div>
            <div class="col-lg-5 text-md-right">
            <a href="{{ route('car.store') }}" class="btn btn-primary btn-sm">Sewa Sekarang</a>
            </div>
          </div>
        </div>
      </div>

      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <strong><h2 class="footer-heading mb-4">Ikuti kami</h2></strong>
              <p>
               {{ $setting->footer_description }}
              </p>
              <ul class="list-unstyled social">
                <li>
                  <a href="{{ $setting->facebook }}"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="{{ $setting->instagram }}"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="{{ $setting->twitter }}"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="{{ $setting->linkedin }}"><span class="icon-linkedin"></span></a>
                </li>
              </ul>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Bantuan</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">Pengiriman dan Pengantaran</a></li>
                    <li><a href="#">Kebijakan Pengembalian Dana</a></li>
                    <li><a href="#">Syarat dan Ketentuan</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Website</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Daftar Mobil</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Pembayaran</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">BRI</a></li>
                    <li><a href="#">BNI</a></li>
                    <li><a href="#">MANDIRI</a></li>
                    <li><a href="#">BCA</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  All rights reserved
                  <i class="icon-doll text-danger" aria-hidden="true"></i> by
                  <a href="https://colorlib.com" target="_blank">Kelompok 5 - Manut Pusat</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @stack('script-alt')
  </body>
</html>
