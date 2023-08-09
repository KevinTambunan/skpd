@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Request Aduan Jaringan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/update_aduan/{{$aduan->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name="status" value="menunggu"/>
                            <input type="hidden" name="alasan" value="null"/>
                            <h5><i class="fa-solid fa-user"></i> Informasi Pemohon</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                                        <input type="text"
                                            class="form-control @error('nama_penanggung_jawab') is-invalid @enderror"
                                            id="nama_penanggung_jawab" name="nama_penanggung_jawab"
                                            value="{{ $aduan->nama_penanggung_jawab }}">
                                        @error('nama_penanggung_jawab')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nip_pemohon">Nip Pemohon</label>
                                        <input type="text"
                                            class="form-control @error('nip_pemohon') is-invalid @enderror" id="nip_pemohon"
                                            name="nip_pemohon" value="{{ $aduan->nip_pemohon }}">
                                        @error('nip_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_perangkat_daerah">Nama Perangkat Daerah</label>
                                        <input type="text"
                                            class="form-control @error('nama_perangkat_daerah') is-invalid @enderror"
                                            id="nama_perangkat_daerah" name="nama_perangkat_daerah"
                                            value="{{ $aduan->nama_perangkat_daerah }}">
                                        @error('nama_perangkat_daerah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jabatan_pemohon">Jabatan Pemohon</label>
                                        <input type="text"
                                            class="form-control @error('jabatan_pemohon') is-invalid @enderror"
                                            id="jabatan_pemohon" name="jabatan_pemohon"
                                            value="{{ $aduan->jabatan_pemohon }}">
                                        @error('jabatan_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_telp_pemohon">No Telp Pemohon</label>
                                        <input type="text"
                                            class="form-control @error('no_telp_pemohon') is-invalid @enderror"
                                            id="no_telp_pemohon" name="no_telp_pemohon"
                                            value="{{ $aduan->no_telp_pemohon }}">
                                        @error('no_telp_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_pemohon">Email Pemohon</label>
                                        <input type="text"
                                            class="form-control @error('email_pemohon') is-invalid @enderror"
                                            id="email_pemohon" name="email_pemohon" value="{{ $aduan->email_pemohon }}">
                                        @error('email_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5><i class="fa-solid fa-server"></i> Informasi Lokasi</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_lokasi">Nama Lokasi</label>
                                        <input type="text"
                                            class="form-control @error('nama_lokasi') is-invalid @enderror" id="nama_lokasi"
                                            name="nama_lokasi" value="{{ $aduan->nama_lokasi }}">
                                        @error('nama_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kondisi_lokasi">Kondisi Lokasi</label>
                                        <input type="text"
                                            class="form-control @error('kondisi_lokasi') is-invalid @enderror"
                                            id="kondisi_lokasi" name="kondisi_lokasi"
                                            value="{{ $aduan->kondisi_lokasi }}">
                                        @error('kondisi_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamat_lokasi">Alamat Lokasi</label>
                                        <input type="text"
                                            class="form-control @error('alamat_lokasi') is-invalid @enderror"
                                            id="alamat_lokasi" name="alamat_lokasi" value="{{ $aduan->alamat_lokasi }}">
                                        @error('alamat_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kota_kabupaten">Kota/Kabupaten</label>
                                        <select class="form-control" id="kota_kabupaten" name="kota_kabupaten">
                                            <option>Medan timur</option>
                                            <option>Medan barat</option>
                                            <option>Medan pusat</option>
                                            <option>Medan selatan</option>
                                            <option>Medan utara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option>Medan timur</option>
                                            <option>Medan barat</option>
                                            <option>Medan pusat</option>
                                            <option>Medan selatan</option>
                                            <option>Medan utara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <select class="form-control" id="kelurahan" name="kelurahan">
                                            <option>Medan timur</option>
                                            <option>Medan barat</option>
                                            <option>Medan pusat</option>
                                            <option>Medan selatan</option>
                                            <option>Medan utara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rt">RT</label>
                                        <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                            id="rt" name="rt" value="{{ $aduan->rt }}">
                                        @error('rt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                            id="rw" name="rw" value="{{ $aduan->rw }}">
                                        @error('rw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5><i class="fa-solid fa-server"></i> Informasi Kebutuhan Koneksi Internet</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kecepatan_internet">Kecepatan Internet</label>
                                        <input type="text"
                                            class="form-control @error('kecepatan_internet') is-invalid @enderror"
                                            id="kecepatan_internet" name="kecepatan_internet"
                                            value="{{ $aduan->kecepatan_internet }}">
                                        @error('kecepatan_internet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Dokumen Penunjang Akses</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('dokumen_penunjang_akses') is-invalid @enderror"
                                            id="dokumen_penunjang_akses" name="dokumen_penunjang_akses">
                                        <label class="custom-file-label" for="dokumen_penunjang_akses">Upload file Dokumen Penunjang Akses</label>
                                        @error('dokumen_penunjang_akses')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Gambar Lokasi</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('gambar_lokasi') is-invalid @enderror"
                                            id="gambar_lokasi" name="gambar_lokasi">
                                        <label class="custom-file-label" for="gambar_lokasi">Upload Gambar Lokasi</label>
                                        @error('gambar_lokasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Create Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
