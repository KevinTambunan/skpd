<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    public function index_verifikator(){
        $aduans = Aduan::orderBy('id', 'desc')->get();
        return view('verifikator.aduan', compact(['aduans']));
    }
    public function setuju($id)
    {
        Aduan::where('id', $id)->update([
            'status' => 'diterima'
        ]);
        return redirect('/aduan_verifikator');
    }
    public function ditolak(Request $request, $id)
    {
        Aduan::where('id', $id)->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan,
        ]);
        return redirect('/aduan_verifikator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aduans = Aduan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.aduan', compact(['aduans']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.aduan-create');
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
           'user_id' => 'required',
            'nama_perangkat_daerah'=>'required',
            'nip_pemohon' => 'required|numeric',
            'nama_penanggung_jawab'=>'required',
            'jabatan_pemohon'=>'required',
            'no_telp_pemohon' => 'required|numeric',
            'email_pemohon'=>'required',
            'nama_lokasi'=>'required',
            'kondisi_lokasi'=>'required',
            'alamat_lokasi'=>'required',
            'kota_kabupaten'=>'required',
            'kecamatan'=>'required',
            'kelurahan'=>'required',
            'rt'=>'required',
            'rw'=>'required',
            'kecepatan_internet'=>'required',
            'dokumen_penunjang_akses'=>'required|mimes:pdf',
            'gambar_lokasi'=>'required',
            'status'=>'required',
           'alasan' => 'required'
        ]);
        $product_image = $request->file('dokumen_penunjang_akses');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);

        $product_image2 = $request->file('gambar_lokasi');
        $gambar2 = $product_image2->getClientOriginalName();
        $tujuan_upload2 = './assets/image';
        $product_image2->move($tujuan_upload2, $gambar2);

        Aduan::create([
            'user_id' => $request->user_id,
             'nama_perangkat_daerah'=>$request->nama_perangkat_daerah,
             'nip_pemohon' => $request->nip_pemohon,
             'nama_penanggung_jawab'=>$request->nama_penanggung_jawab,
             'jabatan_pemohon'=>$request->jabatan_pemohon,
             'no_telp_pemohon' => $request->no_telp_pemohon,
             'email_pemohon'=>$request->email_pemohon,
             'nama_lokasi'=>$request->nama_lokasi,
             'kondisi_lokasi'=>$request->kondisi_lokasi,
             'alamat_lokasi'=>$request->alamat_lokasi,
             'kota_kabupaten'=>$request->kota_kabupaten,
             'kecamatan'=>$request->kecamatan,
             'kelurahan'=>$request->kelurahan,
             'rt'=>$request->rt,
             'rw'=>$request->rw,
             'kecepatan_internet'=>$request->kecepatan_internet,
             'dokumen_penunjang_akses'=>$gambar,
             'gambar_lokasi'=>$gambar2,
             'status'=>$request->status,
             'alasan' => $request->alasan
         ]);

        return redirect('/aduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function show(Aduan $aduan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aduan = Aduan::where('id', $id)->get()->last();
        return view('user.aduan-edit', compact(['aduan']));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
             'user_id' => 'required',
             'nama_perangkat_daerah'=>'required',
             'nip_pemohon' => 'required',
             'nama_penanggung_jawab'=>'required',
             'jabatan_pemohon'=>'required',
             'no_telp_pemohon' => 'required',
             'email_pemohon'=>'required',
             'nama_lokasi'=>'required',
             'kondisi_lokasi'=>'required',
             'alamat_lokasi'=>'required',
             'kota_kabupaten'=>'required',
             'kecamatan'=>'required',
             'kelurahan'=>'required',
             'rt'=>'required',
             'rw'=>'required',
             'kecepatan_internet'=>'required',
             'dokumen_penunjang_akses'=>'required',
             'gambar_lokasi'=>'required',
             'status'=>'required',
             'alasan' => 'required'
         ]);

        $product_image = $request->file('dokumen_penunjang_akses');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);

        $product_image2 = $request->file('gambar_lokasi');
        $gambar2 = $product_image2->getClientOriginalName();
        $tujuan_upload2 = './assets/image';
        $product_image2->move($tujuan_upload2, $gambar2);

         Aduan::where('id', $id)->update([
            'user_id' => $request->user_id,
             'nama_perangkat_daerah'=>$request->nama_perangkat_daerah,
             'nip_pemohon' => $request->nip_pemohon,
             'nama_penanggung_jawab'=>$request->nama_penanggung_jawab,
             'jabatan_pemohon'=>$request->jabatan_pemohon,
             'no_telp_pemohon' => $request->no_telp_pemohon,
             'email_pemohon'=>$request->email_pemohon,
             'nama_lokasi'=>$request->nama_lokasi,
             'kondisi_lokasi'=>$request->kondisi_lokasi,
             'alamat_lokasi'=>$request->alamat_lokasi,
             'kota_kabupaten'=>$request->kota_kabupaten,
             'kecamatan'=>$request->kecamatan,
             'kelurahan'=>$request->kelurahan,
             'rt'=>$request->rt,
             'rw'=>$request->rw,
             'kecepatan_internet'=>$request->kecepatan_internet,
             'dokumen_penunjang_akses'=>$gambar,
             'gambar_lokasi'=>$gambar2,
             'status'=>$request->status,
             'alasan' => $request->alasan
         ]);

         return redirect('/aduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aduan::where('id', $id)->delete();

        return redirect('/aduan');
    }
}
