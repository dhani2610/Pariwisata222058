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

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Destinasi Wisata</h2>
            <div><span>{{ $wisata->nama_222058 }}</span></div>
        </div><!-- End Section Title -->
    </section><!-- /Pricing Section -->

    <section id="pricing" class="pricing section">
        <div class="container">
            @include('backend.layouts.partials.messages')

            <div class="container">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Step 3</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('store-pesan-tiket', $wisata->id_222058) }}">
                    @csrf
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 1</h3>
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <center>
                                            @php
                                                $imgFirst = \App\Models\FotoWisata::where(
                                                    'wisata_id_222058',
                                                    $wisata->id_222058,
                                                )->first();
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

                                <div class="container section-title" style="margin-top: 5%" data-aos="fade-up">
                                    <h2>{{ $wisata->nama_222058 }}</h2>
                                    <div><span>{{ $wisata->lokasi_222058 }}</span></div>
                                    <h2 style="float: right;font-size:20px;color:red">@currency($wisata->harga_222058) / Tiket</h2>
                                </div><!-- End Section Title -->

                                <div class="row">
                                    <div class="form-group mt-2">
                                        <span>Tanggal Kunjungan</span>
                                        <input type="date" name="tanggal_kunjungan" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <span>Jumlah Tiket</span>
                                        <input type="number" name="jumlah_tiket" class="form-control">
                                    </div>
                                    <input type="hidden" name="harg_tiket" value="{{ $wisata->harga_222058 }}">
                                    <input type="hidden" name="harg_tiket_view" value="@currency($wisata->harga_222058)">

                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right mt-4" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 2 : Pilih Jasa Travel (Optional)</h3>
                                @foreach ($jasa as $j)
                                    <div class="row mt-2">
                                        <div class="col-lg-12">
                                            <div class="card" style="border: 1px solid red; border-radius:10px">
                                                <div class="card-body">
                                                    <div class="form-check">
                                                        <!-- Radio Button -->
                                                        <input type="radio" class="form-check-input travel"
                                                            onclick="updateJasaTravel('{{ $j->id_222058 }}','{{ $j->harga_perjalanan_222058 }}','{{ $j->nama_travel_222058 }}')"
                                                            id="travel_{{ $j->id }}" value="{{ $j->id_222058 }}"
                                                            data-harga="{{ $j->harga_perjalanan_222058 }}"
                                                            data-nama="{{ $j->nama_travel_222058 }}">
                                                        <label class="form-check-label" for="travel_{{ $j->id }}"
                                                            style="width: 100%">
                                                            <h5 class="card-title">Jasa Travel -
                                                                {{ $j->nama_travel_222058 }}</h5>
                                                            <h5 class="card-title"><i class="fa-solid fa-car"></i>
                                                                {{ $j->jenis_kendaraan_222058 }}</h5>
                                                            <h5 class="card-title" style="float: right">@currency($j->harga_perjalanan_222058)
                                                            </h5>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button class="btn btn-default prevBtn btn-lg pull-left mt-4" type="button">Prev</button>
                                <button class="btn btn-primary nextBtn nextBtn2 btn-lg pull-right mt-4" type="button">Next</button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="input-id-jasa-travel" name="jasa_travel">
                    <input type="hidden" class="input-nama-jasa-travel" name="nama_jasa_travel">
                    <input type="hidden" class="input-harga-jasa-travel" name="harga_jasa_travel">

                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 3 : Konfirmasi Pesanan</h3>

                                <div class="container">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Tiket Pesanan :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label id="tiketPesanan" for="" style="float: right"></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Jasa Travel :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label id="jasaTravel" for="" style="float: right"></label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label id="totalBayar" for="" style="float: right"></label>
                                                </div>
                                            </div>

                                            <!-- Input Hidden -->
                                            <input type="hidden" name="jumlah_bayar" id="jumlahBayar">

                                        </div>
                                    </div>

                                    <h3 class="mt-2"> Detail Pengunjung</h3>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group mt-2">
                                                    <span>Nama Lengkap</span>
                                                    <input type="text" name="nama_lengkap" class="form-control">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <span>Email</span>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <span>No Telepon</span>
                                                    <input type="number" name="no_telepon" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-default prevBtn btn-lg pull-left mt-4" type="button">Prev</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right mt-4" type="submit">Konfirmasi
                                    Bayar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section><!-- /Pricing Section -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function updateJasaTravel(id, harga, nama) {
            console.log(id);
            
            $('.input-id-jasa-travel').val(id);
            $('.input-nama-jasa-travel').val(nama);
            $('.input-harga-jasa-travel').val(harga);

        }
        document.addEventListener('DOMContentLoaded', function() {

            const nextStepBtn = document.querySelector('.nextBtn');
            const nextStepBtn2 = document.querySelector('.nextBtn2');

            nextStepBtn2.addEventListener('click', function() {
                // Ambil data dari Step 2
                const jumlahTiket = document.querySelector('input[name="jumlah_tiket"]').value || 0;
                const hargaTiket = document.querySelector('input[name="harg_tiket"]').value || 0;

                // Ambil data dari input hidden
                const hargaJasa = document.querySelector('input[name="harga_jasa_travel"]').value || 0;
                const namaJasa = document.querySelector('input[name="nama_jasa_travel"]').value || 'Tidak ada';

                console.log('Jumlah Tiket:', jumlahTiket, 'Harga Tiket:', hargaTiket);
                console.log('Jasa Travel:', hargaJasa, namaJasa);

                // Kalkulasi total bayar
                const totalTiketHarga = jumlahTiket * hargaTiket;
                const totalBayar = parseInt(totalTiketHarga) + parseInt(hargaJasa);

                // Tampilkan di Step 3
                document.getElementById('tiketPesanan').textContent = `${jumlahTiket} x Rp ${hargaTiket}`;
                document.getElementById('jasaTravel').textContent = `Rp ${hargaJasa} (${namaJasa})`;
                document.getElementById('totalBayar').textContent = `Total Bayar: Rp ${totalBayar}`;

                // Simpan di input hidden
                document.getElementById('jumlahBayar').value = totalBayar;
            });
        });

        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            allPrevBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev()
                    .children("a");

                $(".form-group").removeClass("has-error");
                prevStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
@endsection
