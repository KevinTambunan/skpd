@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Hosting</h1>
        <p>Hosting yang anda ajukan, klik button dibawah untuk request hosting</p>
        <a class="btn btn-primary mb-4" href="/tambah_hosting">Request Hosting</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request Hosting</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Aplikasi</th>
                                <th>Kebutuhan Hosting</th>
                                <th>Usulan Hosting</th>
                                <th>Nama Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Tanggal dibuat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hostings as $hosting)
                                <tr>
                                    <td>{{ $hosting->nama_aplikasi }}</td>
                                    <td>{{ $hosting->kebutuhan_hosting }}</td>
                                    <td>{{ $hosting->usulan_sub_domain }}</td>
                                    <td>{{ $hosting->nama_pemohon }}</td>
                                    <td>
                                        {{ $hosting->email_pemohon }}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $hosting->created_at }}</span>
                                    </td>
                                    <td>
                                        @if ($hosting->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $hosting->status }}</span>
                                        @elseif ($hosting->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $hosting->status }}</span>
                                        @elseif ($hosting->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $hosting->status }}</span>
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
