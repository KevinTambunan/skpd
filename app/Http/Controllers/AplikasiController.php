<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplikasis = Aplikasi::where("user_id", Auth::user()->id)->get();
        return view('user.aplikasi', compact(['aplikasis']));
    }
    public function index_verifikator()
    {
        $aplikasis = Aplikasi::all();
        return view('verifikator.aplikasi', compact(['aplikasis']));
    }
    public function setuju($id)
    {
        Aplikasi::where('id', $id)->update([
            'status' => 'diterima'
        ]);
        return redirect('/aplikasi_verifikator');
    }
    public function ditolak($id)
    {
        Aplikasi::where('id', $id)->update([
            'status' => 'ditolak'
        ]);
        return redirect('/aplikasi_verifikator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.aplikasi-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nama_dinas' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'file' => 'required',
        ]);

        // Lakukan tindakan jika validasi berhasil
        $product_image = $request->file('file');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);

        Aplikasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nama_dinas' => $request->nama_dinas,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'file' => $gambar,
            'status' => 'menunggu',
        ]);

        return redirect('/aplikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aplikasi $aplikasi)
    {
        //
    }
}
