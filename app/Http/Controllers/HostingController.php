<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostings = Hosting::where('user_id', Auth::user()->id)->get();
        return view('user.hosting', compact(['hostings']));
    }
    public function index_verifikator()
    {
        $hostings = Hosting::all();
        return view('verifikator.hosting', compact(['hostings']));
    }
    public function setuju($id)
    {
        Hosting::where('id', $id)->update([
            'status' => 'diterima'
        ]);
        return redirect('/hosting_verifikator');
    }
    public function ditolak($id)
    {
        Hosting::where('id', $id)->update([
            'status' => 'ditolak'
        ]);
        return redirect('/hosting_verifikator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.hosting-create');
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
            'nama_aplikasi' => 'required',
            'kebutuhan_hosting' => 'required',
            'usulan_sub_domain' => 'required',
            'nama_pemohon' => 'required',
            'nip_pemohon' => 'required',
            'nama_perangkat_daerah' => 'required',
            'jabatan_pemohon' => 'required',
            'no_telp_pemohon' => 'required',
            'email_pemohon' => 'required',
            'nama_pj' => 'required',
            'nip_pj' => 'required',
            'jabatan_pj' => 'required',
            'no_telp_pj' => 'required',
            'email_pj' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        Hosting::create($validated);

        return redirect('/hosting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function show(Hosting $hosting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function edit(Hosting $hosting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hosting $hosting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hosting $hosting)
    {
        //
    }
}
