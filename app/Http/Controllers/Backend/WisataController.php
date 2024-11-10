<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FotoWisata;
use App\Models\JasaTravel;
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
        $data['page_title'] = 'Data Wisata';
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $wisata = new Wisata();
            $wisata->nama_wisata = $request->nama_wisata;
            $wisata->deskripsi = $request->deskripsi;
            $wisata->lokasi = $request->lokasi;
            $wisata->harga_tiket = $request->harga_tiket;
            $wisata->jumlah_tiket = $request->jumlah_tiket;
            $wisata->jumlah_gazebo = $request->jumlah_gazebo; // Adjust column name to match the migration
            $wisata->save();

            if ($request->hasFile('foto_wisata')) {
                $no = 1;
                foreach ($request->file('foto_wisata') as $foto) {
                    $fotoWisata = new FotoWisata();
                    $fotoWisata->id_wisata = $wisata->id;
                    if ($foto) {
                        $image = $foto;
                        $name = $no++ . '-' . time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('assets/img/foto_wisata/');
                        $image->move($destinationPath, $name);
                        $fotoWisata->foto = $name;
                    }
                    $fotoWisata->save();
                }
            }

            $namaTravels = $request->nama_travel;
            $jenisKendaraans = $request->jenis_kendaraan;
            $tarifs = $request->tarif;

            if (is_array($namaTravels) && is_array($jenisKendaraans) && is_array($tarifs)) {
                foreach ($namaTravels as $index => $namaTravel) {
                    $jasaTravel = new JasaTravel();
                    $jasaTravel->id_wisata = $wisata->id;
                    $jasaTravel->nama_travel = $namaTravel;
                    $jasaTravel->jenis_kendaraan = $jenisKendaraans[$index];
                    $jasaTravel->tarif = $tarifs[$index];
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
        $data['wisata'] = Wisata::find($id);
        $data['foto'] = FotoWisata::where('id_wisata', $id)->get();
        $data['jasa'] = JasaTravel::where('id_wisata', $id)->get();

        return view('backend.pages.wisata.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $wisata = Wisata::findOrFail($id);
            $wisata->nama_wisata = $request->nama_wisata;
            $wisata->deskripsi = $request->deskripsi;
            $wisata->lokasi = $request->lokasi;
            $wisata->harga_tiket = $request->harga_tiket;
            $wisata->jumlah_tiket = $request->jumlah_tiket;
            $wisata->jumlah_gazebo = $request->jumlah_gazebo;
            $wisata->save();


            if ($request->has('old_photo')) {
                $oldPhotos = $request->old_photo;
                $existingPhotos = FotoWisata::where('id_wisata', $id)->get();

                foreach ($existingPhotos as $fotoWisata) {
                    if (!in_array($fotoWisata->id, $oldPhotos)) {
                        $filePath = public_path('assets/img/foto_wisata/' . $fotoWisata->foto);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $fotoWisata->delete();
                    }
                }
            }

            if ($request->hasFile('foto_wisata')) {
                $no = 1;

                foreach ($request->file('foto_wisata') as $foto) {
                    $image = $foto;
                    $name = $no++ . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/img/foto_wisata/');
                    $image->move($destinationPath, $name);

                    FotoWisata::create([
                        'id_wisata' => $wisata->id,
                        'foto' => $name
                    ]);
                }
            }

            JasaTravel::where('id_wisata', $id)->delete();
            if ($request->has('nama_travel')) {
                foreach ($request->nama_travel as $index => $namaTravel) {
                    JasaTravel::create([
                        'id_wisata' => $wisata->id,
                        'nama_travel' => $namaTravel,
                        'jenis_kendaraan' => $request->jenis_kendaraan[$index],
                        'tarif' => $request->tarif[$index]
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

            $wisata = Wisata::findOrFail($id);

            $fotos = FotoWisata::where('id_wisata', $id)->get();
            foreach ($fotos as $foto) {
                $filePath = public_path('assets/img/foto_wisata/' . $foto->foto);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $foto->delete();
            }

            JasaTravel::where('id_wisata', $id)->delete();

            $wisata->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Data wisata berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data wisata: ' . $e->getMessage());
        }
    }
}
