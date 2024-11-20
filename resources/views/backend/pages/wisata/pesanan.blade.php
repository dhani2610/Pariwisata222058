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
    </style>

    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="container section-title mt-2" data-aos="fade-up">
                            <h2>Search Tiket</h2>
                            <div><span>Search Tiket Destinasi</span></div>
                        </div><!-- End Section Title -->
                
                        <div class="container section-title">
                            <form action="" method="get">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="no_tiket" placeholder="Input Nomor Tiket"
                                                value="{{ Request::get('no_tiket') }}">
                                            <button type="submit" class="btn btn-primary mt-2" style="float: right">Periksa</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                
                
                            @if (Request::get('no_tiket') != null)
                                @php
                                    $tiketSearch = \App\Models\Tiket::where('no_tiket_222058', Request::get('no_tiket'))->first();
                                @endphp
                                @if ($tiketSearch != null)
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <p>
                                                    <b>
                                                        Tiket Valid
                                                    </b>
                                                </p>
                                            </center>
                                            <div class="border p-3 mb-4">
                                                <h5>Informasi Pengunjung</h5>
                                                <div class="d-flex justify-content-between">
                                                    <p><b>Nama:</b><br> {{ $tiketSearch->nama_lengkap_222058 }}</p>
                                                    <p><b>Email:</b><br> {{ $tiketSearch->email_222058 }}</p>
                                                </div>
                                            </div>
                                            <!-- Visit Date -->
                                            <div class="mb-3">
                                                <p><b><i class="bi bi-calendar"></i> Tanggal Kunjungan:</b>
                                                    {{ \Carbon\Carbon::parse($tiketSearch->tanggal_kunjungan_222058)->format('d F Y') }}
                                                </p>
                                            </div>
                                            <div class="row">
                                                @if ($tiketSearch->status_222058 != 'confirm')
                                                    <a href="{{ route('update-sudah-digunakan', $tiketSearch->id_222058) }}"
                                                        class="btn btn-primary">Tandai Sudah digunakan</a>
                                                @else
                                                    <button
                                                        class="btn btn-info">Tiket Sudah digunakan</bu>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <p>Tiket Tidak Ditemukan</p>
                                            </center>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Kelola Pesanan</h4>

                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Nama Wisata</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Jasa Travel</th>
                                        <th>Total Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiket as $ticket)
                                        <tr>

                                            @php
                                                $user = \App\Models\Admin::where(
                                                    'id',
                                                    $ticket->pengguna_id_222058,
                                                )->first();
                                                $wisata = \App\Models\Wisata::where(
                                                    'id_222058',
                                                    $ticket->wisata_id_222058,
                                                )->first();
                                                $jasa = \App\Models\JasaTravel::where(
                                                    'id_222058',
                                                    $ticket->id_jasa_travel_222058,
                                                )->first();
                                                $pembayaran = \App\Models\Pembayaran::where(
                                                    'tiket_id_222058',
                                                    $ticket->id_222058,
                                                )->first();
                                            @endphp
                                            <td>{{ $ticket->no_tiket_222058 ?? '-' }}</td>
                                            <td>{{ $ticket->nama_lengkap_222058 ?? '-' }}</td>
                                            <td>{{ $ticket->email_222058 ?? '-' }}</td>
                                            <td>{{ $ticket->no_telepon_222058 ?? '-' }}</td>
                                            <td>{{ $ticket->tanggal_kunjungan_222058 ?? '-' }}</td>

                                            <!-- Nama Wisata -->
                                            <td>{{ $wisata->nama_222058 }}</td>

                                            <!-- Jumlah Tiket -->
                                            <td>{{ $ticket->jumlah_tiket_222058 }}</td>

                                            <!-- Jasa Travel -->
                                            <td>{{ $jasa->nama_travel_222058 ?? '-' }}</td>

                                            <!-- Total Pembayaran -->
                                            <td>@currency($ticket->total_222058)</td>

                                            <td>
                                                @if ($pembayaran->bukti_pembayaran_222058 != null)
                                                    <img src="{{ asset('img/bukti_pembayaran/' . $pembayaran->bukti_pembayaran_222058) }}"
                                                        style="max-width: 100px" class="img-fluid" alt="">
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($pembayaran->status_222058 == 'pending_confirmation')
                                                    <span class="badge badge-warning" style="background: #ffc673">Menunggu Konfirmasi Admin</span>
                                                @elseif($pembayaran->status_222058 == 'complate')
                                                    <span class="badge badge-success" style="background: green">Pembayaran Disetujui</span>
                                                @elseif($pembayaran->status_222058 == 'failed')
                                                    <span class="badge badge-danger" style="background: red">Pembayaran Ditolak</span>
                                                @endif
                                            </td>
                                            <!-- Actions -->
                                            <td>
                                                @if ($pembayaran->status_222058 == 'pending_confirmation')
                                                    <a href="{{ route('wisata.update.pesanan', [ 'id' => $pembayaran->id_222058, 'status' => 'complate']) }}"
                                                        class="btn btn-success btn-sm">
                                                        Complate
                                                    </a>
    
                                                    <!-- View Status Pembayaran -->
                                                    <a href="{{ route('wisata.update.pesanan', [ 'id' => $pembayaran->id_222058, 'status' => 'failed']) }}"
                                                        class="btn btn-danger btn-sm">
                                                        Reject
                                                    </a>
                                                @else
                                                No Action!
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection


@section('script')
    <script>
        function confirmDelete(deleteUrl) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Are you sure delete this data?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete URL if confirmed
                    window.location.href = deleteUrl;
                }
            });
        }
    </script>
@endsection
