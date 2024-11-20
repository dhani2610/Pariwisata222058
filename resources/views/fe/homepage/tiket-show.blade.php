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


    <section id="pricing" class="pricing section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Destinasi Wisata</h2>
            <div><span>Tiket Anda</span></div>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="card">
                <div class="card-body">
                    @php
                        $user = \App\Models\Admin::where(
                            'id',
                            $tiket->pengguna_id_222058,
                        )->first();
                        $wisata = \App\Models\Wisata::where(
                            'id_222058',
                            $tiket->wisata_id_222058,
                        )->first();
                        $jasa = \App\Models\JasaTravel::where(
                            'id_222058',
                            $tiket->id_jasa_travel_222058,
                        )->first();
                        $pembayaran = \App\Models\Pembayaran::where(
                            'tiket_id_222058',
                            $tiket->id_222058,
                        )->first();
                    @endphp
                    <!-- Wisata Title -->
                    <h3 class="card-title">{{ $wisata->nama_222058 }}</h3>
                    <p class="card-text"><em>{{ $wisata->deskripsi_222058 }}</em></p>

                    <!-- User Information -->
                    <div class="border p-3 mb-4">
                        <h5>Informasi Pengunjung</h5>
                        <div class="d-flex justify-content-between">
                            <p><strong>Nama:</strong> {{ $tiket->nama_lengkap_222058 }}</p>
                            <p><strong>Email:</strong> {{ $tiket->email_222058 }}</p>
                        </div>
                    </div>

                    <!-- Visit Date -->
                    <div class="mb-3">
                        <p><strong><i class="bi bi-calendar"></i> Tanggal Kunjungan:</strong>
                            {{ \Carbon\Carbon::parse($tiket->tanggal_kunjungan_222058)->format('d F Y') }}</p>
                    </div>

                    <!-- Location -->
                    <div class="mb-3">
                        <p><strong><i class="bi bi-geo-alt"></i> Lokasi:</strong> {{ $wisata->lokasi_222058 }}</p>
                    </div>

                    <!-- Ticket Number -->
                    <div class="border p-3">
                        <h5>Nomor Tiket</h5>
                        <p class=" fw-bold">{{ $tiket->no_tiket_222058 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
@endsection
