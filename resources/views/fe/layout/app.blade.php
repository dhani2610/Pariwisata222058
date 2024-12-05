<!DOCTYPE html>
<html lang="en">

<head>
    @include('fe.layout.partials.head')
</head>

<body class="index-page">

    @include('fe.layout.partials.navbar')

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('assets/img/Tana-Toraja-2.jpg') }}" alt="" class="hero-bg">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        {{-- <img src="{{asset('assets-fe/img/hero-img.png')}}" class="img-fluid animated" alt="Destinasi Toraja"> --}}
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in"
                        style="min-height: 500px;">
                        <h1>Jelajahi Keajaiban <span>Toraja</span></h1>
                        <p>Temukan pesona budaya, keindahan alam, dan tradisi unik yang hanya ada di Tana Toraja.
                            Perjalanan Anda akan penuh dengan pengalaman yang tak terlupakan.</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Mulai Petualangan</a>
                            <a href="https://www.youtube.com/watch?v=6x46n9viTts"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                        </div>
                    </div>
                </div>
            </div>


            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->

        @yield('content-fe')

    </main>

    @include('fe.layout.partials.footer')


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    @include('fe.layout.partials.foot')

</body>

</html>
