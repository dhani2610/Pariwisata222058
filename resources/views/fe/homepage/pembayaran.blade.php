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

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
    <section id="pricing" class="pricing section">
        <div class="container">
            @include('backend.layouts.partials.messages')

            <div class="container">
                <h2>Pembayaran</h2>

                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Status Pembayaran -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5>Status Pembayaran</h5>
                            @if ($pembayaran->bukti_pembayaran_222058 == null)
                                <span class="badge badge-warning" style="background: #ffc673">Menunggu Pembayaran</span>
                            @else
                                @if ($pembayaran->status_222058 == 'pending_confirmation')
                                    <span class="badge badge-warning" style="background: #ffc673">Menunggu Konfirmasi
                                        Admin</span>
                                @elseif($pembayaran->status_222058 == 'complate')
                                    <span class="badge badge-success" style="background: green">Pembayaran Disetujui</span>
                                @elseif($pembayaran->status_222058 == 'failed')
                                    <span class="badge badge-danger" style="background: red">Pembayaran Ditolak</span>
                                @endif
                            @endif
                        </div>

                        <!-- Booking ID -->
                        <p><strong>Booking ID:</strong> VBASA{{ $tiket->id_222058 }}</p>

                        <!-- Instruksi Pembayaran -->
                        <div class="border p-3 mb-4">
                            <h5>Instruksi Pembayaran</h5>
                            <p><strong>Total Bayar:</strong> Rp. 75.000</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <span>No Rekening:</span>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <span>123-499-571</span>
                                    <button onclick="copyToClipboard('123-499-571')"
                                        class="btn btn-light btn-sm">Copy</button>
                                </div>
                            </div>

                            <p><strong>Bank:</strong> Bank Central Asia</p>
                            <p><strong>a.n:</strong> Anzar</p>
                        </div>

                        @if ($pembayaran->bukti_pembayaran_222058 == null)
                            <!-- Upload Bukti Pembayaran -->
                            <form action="{{ route('processPayment', $pembayaran->id_222058) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" required
                                        class="form-control">
                                </div>
                                <input type="hidden" name="tiket_id" value="{{ $tiket->id_222058 }}">

                                <!-- Kembali Button -->
                                <div class="mt-3">
                                    <center>
                                        <a href="{{ route('index') }}" class="btn btn-secondary">Kembali ke Beranda</a>
                                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                                    </center>
                                </div>
                            </form>
                        @else
                            <h2>Bukti Pembayaran</h2> <br>
                            <img src="{{ asset('img/bukti_pembayaran/' . $pembayaran->bukti_pembayaran_222058) }}"
                                style="max-width: 200px" class="img-fluid" alt="">
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('No rekening berhasil disalin ke clipboard');
            });
        }
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
