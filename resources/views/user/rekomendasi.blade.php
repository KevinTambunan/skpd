@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Rekomendasi</h1>
        <p>Rekomendasi yang anda ajukan, klik button dibawah untuk request rekomendasi</p>
        <a class="btn btn-primary mb-4" href="/tambah_rekomendasi">Request Rekomendasi</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request Rekomendasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pemohon</th>
                                <th>Nip Pemohon</th>
                                <th>Nama Perangkat Daerah</th>
                                <th>Jabatan Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Tanggal dibuat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekomendasis as $rekomendasi)
                                <tr>
                                    <td>{{ $rekomendasi->nama_pemohon }}</td>
                                    <td>{{ $rekomendasi->nip_pemohon }}</td>
                                    <td>{{ $rekomendasi->nama_perangkat_daerah }}</td>
                                    <td>{{ $rekomendasi->jabatan_pemohon }}</td>
                                    <td>
                                        {{ $rekomendasi->email_pemohon }}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $rekomendasi->created_at }}</span>
                                    </td>
                                    <td>
                                        @if ($rekomendasi->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $rekomendasi->status }}</span>
                                        @elseif ($rekomendasi->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $rekomendasi->status }}</span>
                                        @elseif ($rekomendasi->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $rekomendasi->status }}</span>
                                        @endif
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
