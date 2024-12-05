@extends('fe.layout.app')

@section('content-fe')
    <style>
        /* .showcase {
                    background-color: #fefefe;
                    min-height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                } */

        .travel-card {
            position: relative;
            display: inline-flex;
            flex-flow: column nowrap;
            font-weight: 300;
            background-color: white;
            box-shadow: 0px 0px 100px -10px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            width: 350px;
        }

        .travel-card:hover>.button-favorite {
            display: inline-flex;
        }

        .travel-card:hover>.image>img {
            transform: scale(1.2);
        }

        .travel-card .image {
            width: 100%;
            height: 250px;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
            overflow: hidden;
        }

        .travel-card .image>img {
            width: 100%;
            height: 100%;
            /* background-image: url("https://cache-graphicslib.viator.com/graphicslib/page-images/742x525/467829_Viator_Unsplash_170410.jpg"); */
            background-position: center;
            background-size: cover;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
            transition: all 0.28s ease-in-out;
        }

        .travel-card>.content {
            color: #545454;
            padding: 1em 1.5em;
        }

        .travel-card>.content> :nth-child(1n+2) {
            margin-top: 1em;
        }

        .travel-card>.content>.category {
            font-size: 1.2em;
            color: #bababa;
        }

        .travel-card>.content>.topic {
            font-size: 1.3em;
            word-break: break-all;
            max-height: calc(1rem * 2.8 * 2);
            overflow: hidden;
            position: relative;
            background-color: white;
        }

        .travel-card>.content>.recommendation {
            display: flex;
            align-items: center;
        }

        .travel-card>.content>.recommendation>.score {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: #fecf8b;
            background: linear-gradient(130deg, #fecf8b 0%, #ffc673 75%, #ffbb58 100%);
            color: white;
            padding: 5px 8px;
            border-radius: 30px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .travel-card>.content>.recommendation>.score> :first-child {
            padding-top: 1px;
            padding-left: 4px;
        }

        .travel-card>.content>.recommendation>.score> :last-child {
            font-size: 1.1em;
            padding-left: 6px;
        }

        .travel-card>.content>.recommendation>.comment {
            color: #bababa;
            margin-left: 1.5em;
        }

        .travel-card>.content>.price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .travel-card>.content>.price>.discount-info {
            color: #4fc3f7;
        }

        .travel-card>.content>.price>.original-price {
            font-size: 2em;
        }

        .travel-card>.button-favorite {
            width: 2.8em;
            height: 2.8em;
            display: none;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: white;
            color: #bababa;
            border-radius: 50%;
            box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.1);
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .travel-card>.button-favorite:hover> :first-child {
            display: none;
        }

        .travel-card>.button-favorite:hover> :last-child {
            display: block;
        }

        .travel-card>.button-favorite>i {
            font-size: 1.8em;
            padding-top: 2px;
        }

        .travel-card>.button-favorite> :last-child {
            display: none;
            color: #ff5a60;
        }

        .two-block {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Batasi ke 2 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">

                <div class="col-xl-5 content">
                    <h3>Tentang Kami</h3>
                    <h2>Keajaiban Tana Toraja yang Memikat</h2>
                    <p>Tana Toraja adalah destinasi yang kaya akan budaya, tradisi unik, dan keindahan alam yang
                        menakjubkan.
                        Dari rumah adat Tongkonan yang ikonik hingga ritual tradisional yang memukau, Toraja menawarkan
                        pengalaman tak terlupakan
                        yang mempertemukan sejarah, seni, dan alam dalam harmoni sempurna.</p>
                    <a href="#" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-buildings"></i>
                                <h3>Rumah Adat Tongkonan</h3>
                                <p>Jelajahi rumah adat yang menjadi simbol kekayaan budaya Toraja, lengkap dengan ukiran
                                    khas
                                    dan arsitektur yang unik.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-pulse"></i>
                                <h3>Tradisi Rambu Solo</h3>
                                <p>Saksikan upacara pemakaman tradisional yang penuh makna dan merupakan salah satu daya
                                    tarik
                                    utama budaya Toraja.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-command"></i>
                                <h3>Keindahan Alam</h3>
                                <p>Temukan panorama pegunungan, lembah hijau, dan sawah bertingkat yang menciptakan suasana
                                    yang menenangkan jiwa.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-graph-up-arrow"></i>
                                <h3>Kerajinan Lokal</h3>
                                <p>Kunjungi pasar lokal dan temukan kerajinan khas Toraja seperti tenun ikat dan ukiran kayu
                                    yang sarat akan nilai seni.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- /About Section -->
    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">


                <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ count($wisata) }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Destinasi Wisata</p>
                    </div>
                </div><!-- End Stats Item -->



            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Details Section -->
    <section id="details" class="details section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Detail</h2>
            <div><span>Cek Kemudahan</span> <span class="description-title">Pemesanan Tiket</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <!-- Features Item 1 -->
            <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="assets-fe/img/details-1.png" class="img-fluid" alt="Pemesanan Mudah">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>Pemesanan Mudah dan Cepat</h3>
                    <p class="fst-italic">
                        Nikmati proses pemesanan tiket wisata Toraja yang cepat, mudah, dan praktis hanya melalui beberapa
                        klik.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i><span> Antarmuka yang sederhana dan ramah pengguna.</span></li>
                        <li><i class="bi bi-check"></i> <span>Pilih destinasi favorit Anda dengan mudah.</span></li>
                        <li><i class="bi bi-check"></i> <span>Konfirmasi langsung setelah pembayaran berhasil.</span></li>
                    </ul>
                </div>
            </div><!-- Features Item -->

            <!-- Features Item 2 -->
            <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets-fe/img/details-2.png" class="img-fluid" alt="Pilihan Destinasi">
                </div>
                <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
                    <h3>Pilihan Destinasi Wisata Toraja</h3>
                    <p class="fst-italic">
                        Temukan berbagai destinasi menarik di Toraja, mulai dari keindahan alam hingga warisan budaya yang
                        kaya.
                    </p>
                    <p>
                        Pilih destinasi seperti Tongkonan, Londa, atau Ke'te Kesu' langsung dari situs web kami. Deskripsi
                        lengkap dan
                        foto-foto akan membantu Anda menentukan pilihan terbaik.
                    </p>
                </div>
            </div><!-- Features Item -->

            <!-- Features Item 3 -->
            <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                    <img src="assets-fe/img/details-3.png" class="img-fluid" alt="Layanan Pelanggan">
                </div>
                <div class="col-md-7" data-aos="fade-up">
                    <h3>Layanan Pelanggan Siap Membantu</h3>
                    <p>
                        Kami menyediakan layanan pelanggan yang siap membantu Anda jika mengalami kendala selama proses
                        pemesanan.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> <span>Dukungan pelanggan 24/7 melalui chat dan email.</span></li>
                        <li><i class="bi bi-check"></i><span> Panduan lengkap untuk pemesanan tiket.</span></li>
                        <li><i class="bi bi-check"></i> <span>Solusi cepat untuk setiap permasalahan Anda.</span></li>
                    </ul>
                </div>
            </div><!-- Features Item -->

        </div>

    </section><!-- /Details Section -->


    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <div><span>Check Our</span> <span class="description-title">Gallery</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                @foreach ($foto as $item)
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/foto_wisata/' . $item->url_foto_222058) }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/foto_wisata/' . $item->url_foto_222058) }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Gallery Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Destinasi Wisata</h2>
            <div><span>Kunjungi</span> <span class="description-title">Keindahan Toraja</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach ($wisata as $w)
                    <div class="col-lg-4">
                        <div class="showcase">
                            <a href="{{ route('wisata-detail',$w->id_222058) }}" class="travel-card">
                                @php
                                    $imgFirst = \App\Models\FotoWisata::where(
                                        'wisata_id_222058',
                                        $w->id_222058,
                                    )->first();
                                    $review = \App\Models\Review::where(
                                        'wisata_id_222058',
                                        $w->id_222058,
                                    )->get();
                                @endphp
                                <div class="image">
                                    @if ($imgFirst == null)
                                        <img
                                            src="https://cache-graphicslib.viator.com/graphicslib/page-images/742x525/467829_Viator_Unsplash_170410.jpg">
                                    @else
                                    {{-- @dd($imgFirst->url_foto_222058) --}}
                                        <img src="{{ asset('assets/img/foto_wisata/' . $imgFirst->url_foto_222058) }}">
                                    @endif
                                </div>
                                <div class="content">
                                    <div class="recommendation">
                                        <div class="score">
                                            <span>4.3</span>
                                            <i class="material-icons">star</i>
                                        </div>
                                        <div class="comment">({{count($review)}} Reviews)</div>
                                    </div>
                                    <h1 class="topic">{{ $w->nama_222058 }}</h1>
                                    <p class="two-block">{{ $w->deskripsi_222058 }}</p>

                                    <div class="price">
                                        <div class="discount-info">
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $w->lokasi_222058 }}
                                        </div>
                                        <div class="original-price">@currency($w->harga_222058)</div>
                                    </div>
                                </div>
                                {{--         
                                <button class="button-favorite">
                                    <i class="material-icons">favorite_border</i>
                                    <i class="material-icons">favorite</i>
                                </button> --}}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <div class="container-fluid">

            <div class="row gy-4">

                <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                    <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                        <h3><span>Pertanyaan yang </span><strong>Sering Diajukan</strong></h3>
                        <p>
                            Temukan informasi penting tentang cara memesan tiket destinasi wisata di Toraja dengan mudah.
                            Dari memilih destinasi hingga mengecek tiket Anda.
                        </p>
                    </div>

                    <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-item faq-active">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Bagaimana cara memilih destinasi wisata?</h3>
                            <div class="faq-content">
                                <p>Anda dapat melihat berbagai pilihan destinasi wisata menarik di Toraja melalui website
                                    kami. Pilih destinasi yang sesuai dengan minat Anda dan klik tombol "Pilih Destinasi".
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Bagaimana cara memesan tiket?</h3>
                            <div class="faq-content">
                                <p>Setelah memilih destinasi, klik tombol "Pesan". Isi informasi yang diperlukan seperti
                                    nama, kontak, dan jumlah tiket yang ingin dipesan. Proses ini cepat dan mudah!</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apa itu jasa wisata dan bagaimana cara memilihnya?</h3>
                            <div class="faq-content">
                                <p>Jasa wisata adalah layanan tambahan seperti pemandu wisata atau paket tur. Anda dapat
                                    memilih jasa wisata yang tersedia sesuai kebutuhan Anda setelah memilih destinasi.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Bagaimana cara melakukan pembayaran?</h3>
                            <div class="faq-content">
                                <p>Setelah selesai memesan, Anda akan menerima informasi pembayaran. Lakukan transfer ke
                                    rekening yang tertera, lalu konfirmasi pembayaran melalui sistem kami.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Bagaimana cara memeriksa tiket saya?</h3>
                            <div class="faq-content">
                                <p>Anda dapat memeriksa status tiket Anda dengan memasukkan nomor tiket yang telah diberikan
                                    di halaman "Cek Tiket". Pastikan Anda menyimpan nomor tiket tersebut dengan baik.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>

                <div class="col-lg-5 order-1 order-lg-2">
                    <img src="assets-fe/img/faq.jpg" class="img-fluid" alt="FAQ Image" data-aos="zoom-in"
                        data-aos-delay="100">
                </div>
            </div>

        </div>

    </section><!-- /Faq Section -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
@endsection
