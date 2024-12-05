<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pengguna;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('pengguna')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['admins'] = Pengguna::get();
        $data['wisata'] = Wisata::orderBy('created_at', 'desc')->get();
        return view('backend.pages.admins.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100',
            'password' => 'required|min:6|confirmed',
        ]);

        $pengguna = new Pengguna();
        $pengguna->nama_222058 = $request->name;
        $pengguna->email_222058 = $request->email;
        $pengguna->password_222058 = Hash::make($request->password);
        $pengguna->tipe_222058 = $request->roles;
        $pengguna->save();

        session()->flash('success', 'Admin has been created !!');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $admin = Admin::find($id);
        return view('backend.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to update this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }

        $check  = Pengguna::where('id_222058', $id)->first();
        if ($check != null) {
            $pengguna  = Pengguna::where('id_222058', $id)->first();
        } else {
            $pengguna = new Pengguna();
        }
        $pengguna->nama_222058 = $request->name;
        $pengguna->email_222058 = $request->email;
        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }
        $pengguna->tipe_222058 = $request->roles;
        $pengguna->save();

        session()->flash('success', 'Admin has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }
        $pengguna  = Pengguna::where('id_222058', $id)->first();
        if ($pengguna != null) {
            $pengguna->delete();
        } 

        session()->flash('success', 'Admin has been deleted !!');
        return back();
    }
}
