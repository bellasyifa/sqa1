@extends('layout')

@section('content')
<h1>Tambah Data Mahasiswa</h1>
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
    </div>
    <div class="form-group mb-3">
    <label for="jurusan">Jurusan</label>
    <select name="jurusan" id="jurusan" class="form-control" required>
        <option value="" disabled selected>Pilih Jurusan</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Administrasi Bisnis">Administrasi Bisnis</option>
        <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
    </select>
    @error('jurusan')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
    </div>
    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
    </div>
    <div class="form-group">
        <label for="no_telp">No Telp</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
