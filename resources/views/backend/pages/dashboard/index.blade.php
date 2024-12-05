@extends('backend.layouts-new.app')

@section('title')
    Dashboard Page - Admin Panel
@endsection


@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <div class="row mt-4">




        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div id="container">
                            <center>
                                <h1>
                                    Management Data dan Informasi Travel
                                </h1>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6 mb-lg-0 mb-4 mt-4">
                    <div class="card" style="background: #010066">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex flex-column h-100">
                                        <h4 class="font-weight-bolder" style="color: white">Total Saldo</h4>
                                        <h2 class="font-weight-bolder" id="total-saldo" style="color: white">0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $total = 0;
            @endphp
            
                <div class="col-lg-12 mb-lg-0 mb-4 mt-4">
                    <div class="card" style="">
                        <div class="card-body p-3">
                            <table id="dataTable" class="text-center">
                              <thead class="bg-light text-capitalize">
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Wisata</th>
                                      <th>Nama Pengelola</th>
                                      <th>Jumlah Tiket Terjual</th>
                                      <th>Saldo Pengelola</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($wisata as $item)
                                  @php
                                      $tiket = \App\Models\Tiket::orderBy('created_at', 'desc')
                                          ->where('wisata_id_222058', $item->id_222058)
                                          ->get()
                                          ->pluck('id_222058');
                                      $tiketTerjual = \App\Models\Tiket::orderBy('created_at', 'desc')
                                          ->where('wisata_id_222058', $item->id_222058)
                                          ->get()
                                          ->sum('jumlah_tiket_222058');
                                      $saldo_wisata = \App\Models\Pembayaran::where('status_222058', 'complate')
                                          ->whereIn('tiket_id_222058', $tiket)
                                          ->where('status_222058', 'complate')
                                          ->get()
                                          ->sum('jumlah_bayar_222058');

                                        $pengelola = \App\Models\Pengguna::orderBy('created_at', 'desc')
                                          ->where('id_222058', $item->id_pengelola_222058)
                                          ->first();
                  
                                      $total += $saldo_wisata;
                                  @endphp
                                 <tr>
                                     
                                      <td>{{ $loop->index+1 }}</td>
                                      <td>{{ $item->nama_222058 }}</td>
                                      <td>{{ $pengelola->nama_222058 }}</td>
                                      <td>{{ $tiketTerjual }}</td>
                                      <td>@currency($saldo_wisata)</td>
                                  </tr>
                                 @endforeach
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            <input type="hidden" id="total" value="@currency($total)">

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var total = document.getElementById('total').value;

                    document.getElementById('total-saldo').innerText = total;
                });
            </script>



            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>




            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



            <script>
                $("#datepicker").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });
            </script>
        @endsection
        @push('dashboard')
