
@extends('backend.layouts-new.app')

@section('content')

<style>
  .form-check-label {
      text-transform: capitalize;
  }
  .select2{
    width: 100%!important
  }
  label{
    float: left;
  }
</style>

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">{{ $page_title }} List</h4>
                    <p class="float-right mb-2">
                            <a href="{{ route('wisata.create') }}" class="btn btn-primary text-white mb-3" style="float: right" >
                                Tambah Data {{ $page_title }}  </a>
                           
                    </p>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Nama Wisata</th>
                                    <th>Deskripsi</th>
                                    <th>Lokasi</th>
                                    <th>Harga Tiket</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Jumlah Gazebo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($wisata as $s)
                               <tr>
                                   
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $s->nama_222058 }}</td>
                                    <td>{{ $s->lokasi_222058 }}</td>
                                    <td>@currency($s->harga_222058)</td>
                                    <td>{{ $s->jumlah_tiket_222058 }}</td>
                                    <td>{{ $s->jumlah_gazebo_222058 }}</td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('wisata.edit', $s->id_222058) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <a class="btn btn-danger text-white" onclick="confirmDelete('{{ route('wisata.destroy', $s->id_222058) }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
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