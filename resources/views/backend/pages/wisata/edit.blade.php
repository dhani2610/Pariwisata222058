@extends('backend.layouts-new.app')

@section('content')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }

        .select2 {
            width: 100% !important
        }

        label {
            float: left;
        }

        label {
            text-transform: uppercase;
            float: left;
            color: black;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .header-title {
            text-transform: uppercase;
            color: black;
            font-weight: 800;
        }

        .card hr {
            color: black !important;
        }

        .form-control {
            border: var(--bs-border-width) solid black !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="main-content-inner">
        @include('backend.layouts.partials.messages')

        <div class="row">
            <!-- data table start -->
            <form action="{{ route('wisata.update', $wisata->id_222058) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">

                            <hr>
                            <h4 class="header-title text-center">Data Wisata</h4>
                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Nama Wisata</label>
                                            <input required type="text" class="form-control" id="nama_wisata"
                                                name="nama_wisata" placeholder="" value="{{ $wisata->nama_222058 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{ $wisata->deskripsi_222058 }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Lokasi</label>
                                            <input required type="text" class="form-control" id="lokasi"
                                                name="lokasi" placeholder="" value="{{ $wisata->lokasi_222058 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Harga Tiket (Rp.)</label>
                                            <input required type="number" class="form-control" id="harga_tiket"
                                                name="harga_tiket" placeholder="" value="{{ $wisata->harga_222058 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Jumlah Tiket</label>
                                            <input required type="number" class="form-control" id="jumlah_tiket"
                                                name="jumlah_tiket" placeholder=""
                                                value="{{ $wisata->jumlah_tiket_222058 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Jumlah Gazebo</label>
                                            <input required type="number" class="form-control" id="jumlah_gazebo"
                                                name="jumlah_gazebo" placeholder=""
                                                value="{{ $wisata->jumlah_gazebo_222058 }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <h4 class="header-title text-center">Foto Wisata</h4>
                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <button type="button" class="btn btn-success btn-sm mt-2" id="add-row">+</button>
                                        @foreach ($foto as $f)
                                            <div id="dropify-wrapper">
                                                <div class="dropify-row mb-2">
                                                    <button type="button" class="btn btn-danger btn-sm remove-row"
                                                        style="float: right">-</button>
                                                    <input type="hidden" value="{{ $f->id_222058 }}" name="old_photo[]">
                                                    <input type="file" name="foto_wisata[]" class="dropify"
                                                        data-height="200"
                                                        data-default-file="{{ asset('assets/img/foto_wisata/' . $f->url_foto_222058) }}" />
                                                    <label for="" class="mt-1">Deskripsi</label>
                                                    <input type="text" name="deskripsi_foto[]" class="form-control"
                                                        value="{{ $f->deskripsi_222058 }}" id="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>



                            <hr>
                            <h4 class="header-title text-center">Jasa Travel</h4>
                            <hr>

                            <button type="button" class="btn btn-success btn-sm mt-2 mb-2" id="add-row-jasa">Tambah
                                Travel</button>
                            <table class="table table-bordered" id="travel-services-table">
                                <thead>
                                    <tr>
                                        <th>Nama Travel</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tarif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jasa as $j)
                                        <tr class="travel-row">
                                            <td>
                                                <input type="text" value="{{ $j->nama_travel_222058 }}"
                                                    name="nama_travel[]" class="form-control" placeholder="Nama Travel">
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $j->jenis_kendaraan_222058 }}"
                                                    name="jenis_kendaraan[]" class="form-control"
                                                    placeholder="Jenis Kendaraan">
                                            </td>
                                            <td>
                                                <input type="number" value="{{ $j->harga_perjalanan_222058 }}"
                                                    name="tarif[]" class="form-control" placeholder="Tarif">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm remove-row-jasa">-</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>



                            <button class="btn btn-primary mt-3" style="float: right" type="submit">Simpan Data</button>
                        </div>
                    </div>
                </div>

            </form>
            <!-- data table end -->
        </div>
    </div>

    <!-- Template for new item row -->
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <!-- Add JavaScript here -->
    <script>
        function initializeSelect2() {
            $('.js-example-basic-single').select2();
        }
    </script>

    <script>
        // Initialize Dropify
        $('.dropify').dropify();

        // Add new Dropify input
        $('#add-row').on('click', function() {
            const newRow = `
            <div class="dropify-row mb-2">
                <hr>

                <button type="button" class="btn btn-danger btn-sm remove-row"style="float: right">-</button>
                <input type="file" name="foto_wisata[]" class="dropify" data-height="200" />
                 <label for="" class="mt-1">Deskripsi</label>
                <input type="text" name="deskripsi_foto[]" class="form-control" id="">
            </div>
        `;
            $('#dropify-wrapper').append(newRow);
            $('.dropify').dropify(); // Reinitialize Dropify for new inputs
        });

        // Remove Dropify input
        $('#dropify-wrapper').on('click', '.remove-row', function() {
            $(this).closest('.dropify-row').remove();
        });
    </script>


    <script>
        // Add new row for travel service
        $('#add-row-jasa').on('click', function() {
            const newRow = `
            <tr class="travel-row">
                <td>
                    <input type="text" name="nama_travel[]" class="form-control" placeholder="Nama Travel">
                </td>
                <td>
                    <input type="text" name="jenis_kendaraan[]" class="form-control" placeholder="Jenis Kendaraan">
                </td>
                <td>
                    <input type="number" name="tarif[]" class="form-control" placeholder="Tarif">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row-jasa">-</button>
                </td>
            </tr>
        `;
            $('#travel-services-table tbody').append(newRow);
        });

        // Remove a row
        $('#travel-services-table').on('click', '.remove-row-jasa', function() {
            $(this).closest('.travel-row').remove();
        });
    </script>
@endsection
