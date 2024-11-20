<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FotoWisata;
use App\Models\JasaTravel;
use App\Models\Pembayaran;
use App\Models\Review;
use App\Models\Tiket;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // <-- Tambahkan ini
use Spatie\Permission\Models\Role;


class LandingPageController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Homepage';
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->get()->take(6);
        $data['foto'] = FotoWisata::orderBy('created_at', 'desc')->get()->take(6);

        return view('fe.homepage.index', $data);
    }
    public function wisata()
    {
        $data['page_title'] = 'Wisata';
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->get();

        return view('fe.homepage.wisata', $data);
    }
    public function tiket()
    {
        if (Auth::guard('admin')->user() == null) {
            return redirect('admin/login');
        }
        $data['page_title'] = 'Tiket';
        $data['tiket'] = Tiket::where('pengguna_id_222058', Auth::guard('admin')->user()->id)->orderBy('created_at', 'desc')->get();

        return view('fe.homepage.tiket', $data);
    }
    public function tiketShow($id)
    {
        if (Auth::guard('admin')->user() == null) {
            return redirect('admin/login');
        }
        $data['page_title'] = 'Tiket';
        $data['tiket'] = Tiket::where('id_222058', $id)->first();

        return view('fe.homepage.tiket-show', $data);
    }
    public function wisataDetail($id)
    {
        $data['wisata'] = Wisata::where('id_222058', $id)->first();
        $data['page_title'] = 'Wisata | ' . $data['wisata']->nama_222058;
        $data['foto'] = FotoWisata::where('wisata_id_222058', $id)->orderBy('created_at', 'desc')->get()->take(8);
        $data['jasa'] = JasaTravel::where('wisata_id_222058', $id)->orderBy('created_at', 'desc')->get();
        $data['review'] = Review::where('wisata_id_222058', $id)->orderBy('created_at', 'desc')->get();
        return view('fe.homepage.detail', $data);
    }
    public function pesanTiket($id)
    {
        $data['wisata'] = Wisata::where('id_222058', $id)->first();
        $data['page_title'] = 'Wisata | ' . $data['wisata']->nama_222058;
        $data['foto'] = FotoWisata::where('wisata_id_222058', $id)->orderBy('created_at', 'desc')->get()->take(8);
        $data['jasa'] = JasaTravel::where('wisata_id_222058', $id)->orderBy('created_at', 'desc')->get();

        return view('fe.homepage.pesan', $data);
    }
    public function StorepesanTiket(Request $request, $id)
    {

        if (Auth::guard('admin')->user() == null) {
            return redirect('admin/login');
        }
        try {

            $tiket = new Tiket();
            $tiket->no_tiket_222058 = 'TIKET-' . strtoupper(Str::random(6));
            $tiket->pengguna_id_222058 = Auth::guard('admin')->user()->id;
            $tiket->wisata_id_222058 = $id;
            $tiket->status_222058 = 'pending';
            $tiket->tanggal_kunjungan_222058 = $request->tanggal_kunjungan;
            $tiket->jumlah_tiket_222058 = $request->jumlah_tiket;
            $tiket->total_222058 = $request->jumlah_bayar;
            $tiket->id_jasa_travel_222058 = $request->jasa_travel;
            $tiket->nama_lengkap_222058 = $request->nama_lengkap;
            $tiket->email_222058 = $request->email;
            $tiket->no_telepon_222058 = $request->no_telepon;
            $tiket->save();

            $pembayaran = new Pembayaran();
            $pembayaran->tiket_id_222058 = $tiket->id_222058;
            $pembayaran->status_222058 = 'pending';
            $pembayaran->jumlah_bayar_222058 = $request->jumlah_bayar;
            $pembayaran->metode_pembayaran_222058 = 'transfer';
            $pembayaran->save();


            return redirect()->route('viewPembayaran', ['id' => $tiket->id_222058])
                ->with('success', 'Tiket berhasil dipesan. Silakan lanjutkan pembayaran.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function viewPembayaran($id)
    {
        $data['page_title'] = 'Pembayaran';
        $data['tiket'] = Tiket::where('id_222058', $id)->first();
        $data['pembayaran'] = Pembayaran::where('tiket_id_222058', $id)->first();
        $data['wisata'] = Wisata::where('id_222058', $data['tiket']->wisata_id_222058)->first();

        return view('fe.homepage.pembayaran', $data);
    }

    public function processPayment(Request $request, $id)
    {

        $pembayaran = Pembayaran::where('id_222058', $id)->firstOrFail();

        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $filename = time() . '-' . $pembayaran->id_222058 . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/bukti_pembayaran/');
            $image->move($destinationPath, $filename);

            $pembayaran->bukti_pembayaran_222058 = $filename;
            $pembayaran->status_222058 = 'pending_confirmation';
            $pembayaran->save();
        }

        // Redirect back with a success message
        return back()->with('success', 'Berhasil melakukan pembayaran, silahkan tunggu konfirmasi admin.');
    }
    public function updateSudahDigunakan($id)
    {

        $tiket = Tiket::where('id_222058', $id)->firstOrFail();
        $tiket->status_222058 = 'confirm';
        $tiket->save();

        // Redirect back with a success message
        return back()->with('success', 'Konfirmasi berhasil.');
    }



    public function register()
    {
        $data['page_title'] = 'Register';
        $data['roles']  = Role::all();
        return view('backend.auth.register', $data);
    }

    public function registerStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|max:100|email|unique:admins',
                'password' => 'required|min:6',
            ]);

            // Create New Admin
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->username = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();

            if ($request->roles) {
                $admin->assignRole($request->roles);
            }

            session()->flash('success', 'Register berhasil.');
            return redirect('admin/login');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect('admin/register');
        }
    }

    public function rating(Request $request, $id)
    {
        if (Auth::guard('admin')->user() == null) {
            return redirect('admin/login');
        }

        $review = new Review();
        $review->pengguna_id_222058 = Auth::guard('admin')->user()->id;
        $review->wisata_id_222058 = $id;
        $review->rating_222058 = $request->rating;
        $review->komentar_222058 = $request->komentar;
        $review->save();

        return back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
