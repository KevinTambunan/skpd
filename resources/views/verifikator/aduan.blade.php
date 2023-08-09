@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Aduan Jaringan</h1>
        <p>Aduan jaringan yang telah diajukan, klik aksi ditabel untuk aksi aduan jaringan</p>

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
                                <th>Alamat Lokasi</th>
                                <th>Kecepatan Internet</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Alasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aduans as $aduan)
                                <tr>
                                    <td>{{ $aduan->nama_perangkat_daerah }}</td>
                                    <td>
                                        {{$aduan->alamat_lokasi}}
                                    </td>
                                    <td>
                                        {{$aduan->kecepatan_internet}}
                                    </td>
                                    <td>
                                        <a href="/assets/image/{{ $aduan->gambar_lokasi }}">{{ $aduan->gambar_lokasi }}</a>
                                        <br>
                                        <a href="/assets/image/{{ $aduan->dokumen_penunjang_akses }}">{{ $aduan->dokumen_penunjang_akses }}</a>
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
                                            <a href="/aduan/setuju/{{ $aduan->id }}"
                                                class="btn btn-success btn-sm rounded"><i class="fa-solid fa-check"></i></a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#setuju{{ $aduan->id }}">
                                                <i class="fa-solid fa-xmark"></i></a>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="setuju{{ $aduan->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Permintan
                                                                Aduan Jaringan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/aduan/alasan/create/{{$aduan->id}}" method="post"
                                                                enctype="multipart/form-data" id="formTambahData">
                                                                @csrf
                                                                <h5 class="font-weight-bold">{{ $aduan->nama }}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlTextarea1">Alasan
                                                                                Penolakan</label>
                                                                            <textarea name="alasan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="/aplikasi/ditolak/{{ $aplikasi->id }}"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a> --}}
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
