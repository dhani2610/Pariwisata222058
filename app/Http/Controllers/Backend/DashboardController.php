<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
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

        $data['page_title'] = 'Dashboard';
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->where(function($query) {
            if (Auth::guard('pengguna')->user()->tipe_222058 == 'pengelola wisata') {
                $query->where('id_pengelola_222058',Auth::guard('pengguna')->user()->id_222058);
            }
         })->get();
        
        return view('backend.pages.dashboard.index', $data);
    }
}
