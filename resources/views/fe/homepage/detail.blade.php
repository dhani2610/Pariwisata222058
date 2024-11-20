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

        /*
             *  Pure CSS star rating that works without reversing order
             *  of inputs
             *  -------------------------------------------------------
             *  NOTE: For the styling to work, there needs to be a radio
             *        input selected by default. There also needs to be a
             *        radio input before the first star, regardless of
             *        whether you offer a 'no rating' or 0 stars option
             *
             *  This codepen uses FontAwesome icons
             */
        #full-stars-example {
            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* set icon padding and size */
            /* set default star color */
            /* set color of none icon when unchecked */
            /* if none icon is checked, make it red */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
            /* make none icon grey on rating group hover */
            /* make none icon red on hover */
        }

        #full-stars-example .rating-group {
            display: inline-flex;
        }

        #full-stars-example .rating__icon {
            pointer-events: none;
        }

        #full-stars-example .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #full-stars-example .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #full-stars-example .rating__icon--star {
            color: orange;
        }

        #full-stars-example .rating__icon--none {
            color: #eee;
        }

        #full-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
            color: red;
        }

        #full-stars-example .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
        }

        #full-stars-example .rating__input:hover~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
            color: #eee;
        }

        #full-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
            color: red;
        }

        #half-stars-example {
            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* set icon padding and size */
            /* add padding and positioning to half star labels */
            /* set default star color */
            /* set color of none icon when unchecked */
            /* if none icon is checked, make it red */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
            /* make none icon grey on rating group hover */
            /* make none icon red on hover */
        }

        #half-stars-example .rating-group {
            display: inline-flex;
        }

        #half-stars-example .rating__icon {
            pointer-events: none;
        }

        #half-stars-example .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #half-stars-example .rating__label {
            cursor: pointer;
            /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #half-stars-example .rating__label--half {
            padding-right: 0;
            margin-right: -0.6em;
            z-index: 2;
        }

        #half-stars-example .rating__icon--star {
            color: orange;
        }

        #half-stars-example .rating__icon--none {
            color: #eee;
        }

        #half-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
            color: red;
        }

        #half-stars-example .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #half-stars-example .rating-group:hover .rating__label .rating__icon--star,
        #half-stars-example .rating-group:hover .rating__label--half .rating__icon--star {
            color: orange;
        }

        #half-stars-example .rating__input:hover~.rating__label .rating__icon--star,
        #half-stars-example .rating__input:hover~.rating__label--half .rating__icon--star {
            color: #ddd;
        }

        #half-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
            color: #eee;
        }

        #half-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
            color: red;
        }

        #full-stars-example-two {
            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* hide 'none' input from screenreaders */
            /* set icon padding and size */
            /* set default star color */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
        }

        #full-stars-example-two .rating-group {
            display: inline-flex;
        }

        #full-stars-example-two .rating__icon {
            pointer-events: none;
        }

        #full-stars-example-two .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #full-stars-example-two .rating__input--none {
            display: none;
        }

        #full-stars-example-two .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #full-stars-example-two .rating__icon--star {
            color: orange;
        }

        #full-stars-example-two .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example-two .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
        }

        #full-stars-example-two .rating__input:hover~.rating__label .rating__icon--star {
            color: #ddd;
        }
    </style>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Destinasi Wisata</h2>
            <div><span>{{ $wisata->nama_222058 }}</span></div>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-12">
                    <center>
                        @php
                            $imgFirst = \App\Models\FotoWisata::where('wisata_id_222058', $wisata->id_222058)->first();
                        @endphp
                        <div class="image">
                            @if ($imgFirst == null)
                                <img src="https://cache-graphicslib.viator.com/graphicslib/page-images/742x525/467829_Viator_Unsplash_170410.jpg"
                                    style="max-width: 100%;border-radius:10px">
                            @else
                                {{-- @dd($imgFirst->url_foto_222058) --}}
                                <img src="{{ asset('assets/img/foto_wisata/' . $imgFirst->url_foto_222058) }}"
                                    style="max-width: 100%;border-radius:10px">
                            @endif
                        </div>
                    </center>
                </div>
            </div>

        </div>

    </section><!-- /Pricing Section -->
    <!-- Gallery Section -->
    <section id="gallery" class="gallery section" style="padding-bottom: 10px!important">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Foto-Foto</h2>
            <div><span>Foto Destinasi</span> <span class="description-title">{{ $wisata->nama_222058 }}</span></div>
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
    <section id="pricing" class="pricing section">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-4">
                    <center>
                        <h5>
                            Tiket Tersedia : {{ $wisata->jumlah_tiket_222058 }}
                        </h5>
                    </center>
                </div>
                <div class="col-lg-4">
                    <center>
                        <h5>
                            Jumlah Gazebo : {{ $wisata->jumlah_gazebo_222058 }}
                        </h5>
                    </center>

                </div>
                <div class="col-lg-4">
                    <center>
                        <h5>
                            Jam Operasional : 08:00 - 17.00
                        </h5>
                    </center>
                </div>
            </div>

            <div class="container section-title" style="margin-top: 5%" data-aos="fade-up">
                <h2>{{ $wisata->nama_222058 }}</h2>
                <div><span>{{ $wisata->lokasi_222058 }}</span></div>
                <h2 style="float: right;font-size:20px;color:red">@currency($wisata->harga_222058) / Tiket</h2>
            </div><!-- End Section Title -->

            <div class="row">
                <h2>Tentang Wisata</h2>
                <p>
                    {{ $wisata->deskripsi_222058 }}
                </p>
                <hr>
                <h2>Jasa Travel Tersedia</h2>
                @foreach ($jasa as $j)
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <div class="card" style="border: 1px solid red;border-radius:10px">
                                <div class="card-body">
                                    <h5 class="card-title">Jasa Travel - {{ $j->nama_travel_222058 }}</h5>
                                    <h5 class="card-title"><i class="fa-solid fa-car"></i> {{ $j->jenis_kendaraan_222058 }}
                                    </h5>
                                    <h5 class="card-title" style="float: right">@currency($j->harga_perjalanan_222058)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ro mt-5 mb-5">
                <center>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Review
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Berikan Review Anda</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                @include('backend.layouts.partials.messages')
                                <div class="modal-body">
                                    <form action="{{ route('rating', $wisata->id_222058) }}" action="post">
                                        @csrf
                                        <div id="full-stars-example-two">
                                            <div class="rating-group">
                                                <input disabled checked class="rating__input rating__input--none"
                                                    name="rating" id="rating-none" value="0" type="radio">
                                                <label aria-label="1 star" class="rating__label" for="rating-1"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating" id="rating-1" value="1"
                                                    type="radio">
                                                <label aria-label="2 stars" class="rating__label" for="rating-2"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating" id="rating-2" value="2"
                                                    type="radio">
                                                <label aria-label="3 stars" class="rating__label" for="rating-3"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating" id="rating-3"
                                                    value="3" type="radio">
                                                <label aria-label="4 stars" class="rating__label" for="rating-4"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating" id="rating-4"
                                                    value="4" type="radio">
                                                <label aria-label="5 stars" class="rating__label" for="rating-5"><i
                                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                <input class="rating__input" name="rating" id="rating-5"
                                                    value="5" type="radio">
                                            </div>
                                        </div>
                                        <label for="" style="float: left">Komentar</label>
                                        <textarea name="komentar" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('pesan-tiket', $wisata->id_222058) }}" class="btn btn-success">Pesan Tiket</a>
                </center>
            </div>
            <div class="row">
                <h5>Review</h5>
                <div class="review-list">
                    @foreach ($review as $reviews)
                        @php
                            $user = \App\Models\Admin::where(
                                'id',
                                $reviews->pengguna_id_222058,
                            )->first();
                        @endphp
                        <div class="review-item"
                            style="border: 1px solid #000; padding: 10px; margin-bottom: 10px; border-radius: 10px;">
                            <div style="display: flex; justify-content: space-between;">
                                <strong>{{ $user->name }}</strong>
                                <!-- Replace with user relation -->
                                <span>{{ \Carbon\Carbon::parse($reviews->created_at)->format('d F Y') }}</span>
                            </div>
                            <div>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $reviews->rating_222058)
                                        <i class="fa fa-star" style="color: gold;"></i>
                                    @else
                                        <i class="fa fa-star" style="color: #ddd;"></i>
                                    @endif
                                @endfor
                            </div>
                            <p>{{ $reviews->komentar_222058 }}</p>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </section><!-- /Pricing Section -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
@endsection
