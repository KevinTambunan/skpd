@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Aduan Jaringan</h1>
        <p>Aduan jaringan yang anda ajukan, klik button dibawah untuk request aduan jaringan</p>
        <a class="btn btn-primary mb-4" href="/tambah_aduan">Request Aduan Jaringan</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Perangkat Daerah</th>
                                <th>NIP</th>
                                <th>Lokasi</th>
                                <th>Alamat Lokasi</th>
                                <th>Kecepatan Internet</th>
                                <th>Status</th>
                                <th>Alasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aduans as $aduan)
                                <tr>
                                    <td>{{ $aduan->nama_perangkat_daerah }}</td>
                                    <td>{{ $aduan->nip_pemohon }}</td>
                                    <td>
                                        {{$aduan->nama_lokasi}}
                                    </td>
                                    <td>
                                        {{$aduan->alamat_lokasi}}
                                    </td>
                                    <td>
                                        {{$aduan->kecepatan_internet}}
                                    </td>
                                    <td>
                                        @if ($aduan->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $aduan->status }}</span>
                                        @elseif ($aduan->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $aduan->status }}</span>
                                        @elseif ($aduan->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $aduan->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($aduan->status == 'menunggu')
                                            Masih Menunggu di Konfirmasi
                                        @elseif ($aduan->status == 'ditolak')
                                                {{$aduan->alasan}}
                                        @elseif ($aduan->status == 'diterima')
                                            Request diterima, silahkan ditunggu
                                        @endif
                                    </td>
                                    <td>
                                        @if ($aduan->status == 'menunggu')
                                            <a href="/aduan/edit/{{ $aduan->id }}"
                                                class="btn btn-success btn-sm rounded"><i class="fa-solid fa-pen"></i></a>
                                        @endif
                                        <a href="/aduan/hapus/{{ $aduan->id }}" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-xmark"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
