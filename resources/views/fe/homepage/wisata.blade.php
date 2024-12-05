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
                            <a href="{{ route('wisata-detail', $w->id_222058) }}" class="travel-card">
                                @php
                                    $imgFirst = \App\Models\FotoWisata::where(
                                        'wisata_id_222058',
                                        $w->id_222058,
                                    )->first();
                                @endphp
                                @php
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
                                        <div class="comment">({{ count($review) }} Reviews)</div>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
@endsection
