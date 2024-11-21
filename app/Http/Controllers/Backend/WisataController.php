<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FotoWisata;
use App\Models\JasaTravel;
use App\Models\Pembayaran;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WisataController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $data['page_title'] = 'Wisata';
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->get();

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
        $data['page_title'] = 'Kelola Pesanan';
        $data['page_title'] = 'Tiket';
        $data['tiket'] = Tiket::orderBy('created_at', 'desc')->get();
        return view('backend.pages.wisata.pesanan', $data);
    }

    public function updatePesanan(Request $request, $id,$status)
    {
      
        $pembayaran = Pembayaran::where('id_222058', $id)->firstOrFail();
        $pembayaran->status_222058 = $status; 
        $pembayaran->save();

        // Redirect back with a success message
        return back()->with('success', 'Berhasil update status pesanan.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $wisata = new Wisata();
            $wisata->nama_222058 = $request->nama_wisata; 
            $wisata->deskripsi_222058 = $request->deskripsi; 
            $wisata->lokasi_222058 = $request->lokasi; 
            $wisata->harga_222058 = $request->harga_tiket; 
            $wisata->jumlah_tiket_222058 = $request->jumlah_tiket; 
            $wisata->jumlah_gazebo_222058 = $request->jumlah_gazebo; 
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
        $data['page_title'] = 'Edit Data Wisata';
        $data['wisata'] = Wisata::where('id_222058',$id)->first();
        $data['foto'] = FotoWisata::where('wisata_id_222058', $id)->get();
        $data['jasa'] = JasaTravel::where('wisata_id_222058', $id)->get();

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
            $wisata = Wisata::where('id_222058',$id)->first();
            $wisata->nama_222058 = $request->nama_wisata; 
            $wisata->deskripsi_222058 = $request->deskripsi; 
            $wisata->lokasi_222058 = $request->lokasi; 
            $wisata->harga_222058 = $request->harga_tiket; 
            $wisata->jumlah_tiket_222058 = $request->jumlah_tiket; 
            $wisata->jumlah_gazebo_222058 = $request->jumlah_gazebo; 
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
                        'url_foto_222058' => $name ,
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

            $wisata = Wisata::where('id_222058',$id)->first();

            // Menghapus foto terkait wisata
            $fotos = FotoWisata::where('wisata_id_222058', $id)->get(); 
            foreach ($fotos as $foto) {
                $filePath = public_path('assets/img/foto_wisata/' . $foto->url_foto_222058); 
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $foto->delete();
            }

            // Menghapus data jasa travel terkait wisata
            JasaTravel::where('wisata_id_222058', $id)->delete(); 

            // Menghapus wisata
            $wisata->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Data wisata berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data wisata: ' . $e->getMessage());
        }
    }
}
