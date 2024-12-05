<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FotoWisata;
use App\Models\JasaTravel;
use App\Models\Pembayaran;
use App\Models\Review;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WisataController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('pengguna')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // Menyimpan judul halaman yang akan ditampilkan pada halaman view
        $data['page_title'] = 'Wisata';
        // Mengambil semua data wisata dari database, mengurutkannya berdasarkan waktu pembuatan (created_at) secara menurun
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->where(function($query) {
            if (Auth::guard('pengguna')->user()->tipe_222058 == 'pengelola wisata') {
                $query->where('id_pengelola_222058',Auth::guard('pengguna')->user()->id_222058);
            }
         })->get();

        // Mengirim data ke view 'backend.pages.wisata.index' dengan menggunakan variabel $data yang sudah didefinisikan
        return view('backend.pages.wisata.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Wisata';
        return view('backend.pages.wisata.create', $data);
    }

    public function KelolaPesanan()
    {
        // Menyimpan judul halaman yang akan ditampilkan pada halaman view (kelola pesanan)
        $data['page_title'] = 'Kelola Pesanan';

        $wisata = Wisata::orderBy('created_at', 'desc')->where(function($query) {
            if (Auth::guard('pengguna')->user()->tipe_222058 == 'pengelola wisata') {
                $query->where('id_pengelola_222058',Auth::guard('pengguna')->user()->id_222058);
            }
         })->get()->pluck('id_222058');

        // Mengambil semua data tiket dari database, mengurutkannya berdasarkan waktu pembuatan (created_at) secara menurun
        $data['tiket'] = Tiket::orderBy('created_at', 'desc')->whereIn('wisata_id_222058',$wisata)->get();

        // Mengirim data ke view 'backend.pages.wisata.pesanan' dengan menggunakan variabel $data yang sudah didefinisikan
        return view('backend.pages.wisata.pesanan', $data);
    }


    public function updatePesanan(Request $request, $id, $status)
    {
        // Mencari data pembayaran berdasarkan 'id_222058' yang diberikan, jika tidak ditemukan maka akan menghasilkan error 404
        $pembayaran = Pembayaran::where('id_222058', $id)->firstOrFail();

        // Menyimpan status baru untuk pembayaran yang ditemukan
        $pembayaran->status_222058 = $status;

        // Menyimpan perubahan status pembayaran ke database
        $pembayaran->save();

        // Mengembalikan halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Berhasil update status pesanan.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Simpan data wisata
            $wisata = new Wisata();
            $wisata->nama_222058 = $request->nama_wisata;
            $wisata->deskripsi_222058 = $request->deskripsi;
            $wisata->lokasi_222058 = $request->lokasi;
            $wisata->harga_222058 = $request->harga_tiket;
            $wisata->jumlah_tiket_222058 = $request->jumlah_tiket;
            $wisata->jumlah_gazebo_222058 = $request->jumlah_gazebo;
            $wisata->id_pengelola_222058 = Auth::guard('pengguna')->user()->id_222058;
            $wisata->save();

            // Menyimpan foto wisata
            if ($request->hasFile('foto_wisata')) {
                $no = 1;
                foreach ($request->file('foto_wisata') as $index => $foto) {
                    $fotoWisata = new FotoWisata();
                    $fotoWisata->wisata_id_222058 = $wisata->id_222058;
                    $fotoWisata->deskripsi_222058 = $request->deskripsi_foto[$index];
                    if ($foto) {
                        $image = $foto;
                        $name = $no++ . '-' . time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('assets/img/foto_wisata/');
                        $image->move($destinationPath, $name);
                        $fotoWisata->url_foto_222058 = $name;
                    }
                    $fotoWisata->save();
                }
            }

            // Menyimpan data jasa travel
            $namaTravels = $request->nama_travel;
            $jenisKendaraans = $request->jenis_kendaraan;
            $tarifs = $request->tarif;

            if (is_array($namaTravels) && is_array($jenisKendaraans) && is_array($tarifs)) {
                foreach ($namaTravels as $index => $namaTravel) {
                    $jasaTravel = new JasaTravel();
                    $jasaTravel->wisata_id_222058 = $wisata->id_222058;
                    $jasaTravel->nama_travel_222058 = $namaTravel;
                    $jasaTravel->jenis_kendaraan_222058 = $jenisKendaraans[$index];
                    $jasaTravel->harga_perjalanan_222058 = $tarifs[$index];
                    $jasaTravel->save();
                }
            }

            DB::commit();

            return redirect()->route('wisata')->with('success', 'Data wisata berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('wisata')->with('error', 'Gagal menyimpan data wisata: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menetapkan judul halaman
        $data['page_title'] = 'Edit Data Wisata';

        // Mengambil data wisata berdasarkan ID yang diterima dari parameter
        // Menggunakan `first()` untuk mendapatkan satu baris data yang sesuai dengan ID yang diberikan
        $data['wisata'] = Wisata::where('id_222058', $id)->first();

        // Mengambil foto-foto yang terkait dengan wisata berdasarkan ID wisata
        // `FotoWisata::where('wisata_id_222058', $id)->get()` untuk mendapatkan semua foto yang terkait
        $data['foto'] = FotoWisata::where('wisata_id_222058', $id)->get();

        // Mengambil data jasa travel yang terkait dengan wisata berdasarkan ID wisata
        // `JasaTravel::where('wisata_id_222058', $id)->get()` untuk mendapatkan semua jasa travel terkait
        $data['jasa'] = JasaTravel::where('wisata_id_222058', $id)->get();

        // Mengembalikan tampilan `edit` dengan membawa data wisata, foto, dan jasa travel
        // `view('backend.pages.wisata.edit', $data)` akan memuat halaman edit dan memberikan data yang diperlukan
        return view('backend.pages.wisata.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Menyesuaikan kolom nama sesuai dengan query tabel
            $wisata = Wisata::where('id_222058', $id)->first();
            $wisata->nama_222058 = $request->nama_wisata;
            $wisata->deskripsi_222058 = $request->deskripsi;
            $wisata->lokasi_222058 = $request->lokasi;
            $wisata->harga_222058 = $request->harga_tiket;
            $wisata->jumlah_tiket_222058 = $request->jumlah_tiket;
            $wisata->jumlah_gazebo_222058 = $request->jumlah_gazebo;
            $wisata->id_pengelola_222058 = Auth::guard('pengguna')->user()->id_222058;
            $wisata->save();

            // Menghapus foto yang tidak dipilih lagi
            if ($request->has('old_photo')) {
                $oldPhotos = $request->old_photo;
                $existingPhotos = FotoWisata::where('wisata_id_222058', $id)->get();

                foreach ($existingPhotos as $fotoWisata) {
                    if (!in_array($fotoWisata->id_222058, $oldPhotos)) {
                        $filePath = public_path('assets/img/foto_wisata/' . $fotoWisata->url_foto_222058);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $fotoWisata->delete();
                    }
                }
            }

            // Menambahkan foto baru
            if ($request->hasFile('foto_wisata')) {
                $no = 1;
                foreach ($request->file('foto_wisata') as $index => $foto) {
                    $image = $foto;
                    $name = $no++ . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/img/foto_wisata/');
                    $image->move($destinationPath, $name);

                    FotoWisata::create([
                        'wisata_id_222058' => $wisata->id_222058,
                        'url_foto_222058' => $name,
                        'deskripsi_222058' => $request->deskripsi[$index]
                    ]);
                }
            }

            // Menghapus dan menambah jasa travel
            JasaTravel::where('wisata_id_222058', $id)->delete();
            if ($request->has('nama_travel')) {
                foreach ($request->nama_travel as $index => $namaTravel) {
                    JasaTravel::create([
                        'wisata_id_222058' => $wisata->id_222058,
                        'nama_travel_222058' => $namaTravel,
                        'jenis_kendaraan_222058' => $request->jenis_kendaraan[$index],
                        'harga_perjalanan_222058' => $request->tarif[$index]
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('wisata')->with('success', 'Data wisata berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('wisata')->with('error', 'Gagal memperbarui data wisata: ' . $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $wisata = Wisata::where('id_222058', $id)->first();

            // Menghapus foto terkait wisata
            $fotos = FotoWisata::where('wisata_id_222058', $wisata->id_222058)->get();
            foreach ($fotos as $foto) {
                $filePath = public_path('assets/img/foto_wisata/' . $foto->url_foto_222058);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $foto->delete();
            }

            // Menghapus data jasa travel terkait wisata
            JasaTravel::where('wisata_id_222058', $id)->delete();

            // Menghapus review terkait wisata
            Review::where('wisata_id_222058', $wisata->id_222058)->delete();

            // Menghapus favorit terkait wisata
            Favorit::where('wisata_id_222058', $wisata->id_222058)->delete();

            // Menghapus tiket dan pembayaran terkait wisata
            $tikets = Tiket::where('wisata_id_222058', $wisata->id_222058)->get();
            foreach ($tikets as $tiket) {
                // Menghapus semua pembayaran terkait tiket ini
                Pembayaran::where('tiket_id_222058', $tiket->id_222058)->delete();
                // Menghapus tiket setelah pembayaran dihapus
                $tiket->delete();
            }

            // Menghapus data wisata
            $wisata->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Data wisata berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data wisata: ' . $e->getMessage());
        }
    }
}
