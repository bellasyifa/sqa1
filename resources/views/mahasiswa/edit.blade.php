@extends('layout')

@section('content')
<h1>Edit Data Mahasiswa</h1>
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

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
    </div>
    <div class="form-group mb-3">
    <label for="jurusan">Jurusan</label>
    <select name="jurusan" id="jurusan" class="form-control" required>
        <option value="Teknik Informatika" {{ $mahasiswa->jurusan == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
        <option value="Sistem Informasi" {{ $mahasiswa->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
        <option value="Administrasi Bisnis" {{ $mahasiswa->jurusan == 'Administrasi Bisnis' ? 'selected' : '' }}>Administrasi Bisnis</option>
        <option value="Komputerisasi Akuntansi" {{ $mahasiswa->jurusan == 'Komputerisasi Akuntansi' ? 'selected' : '' }}>Komputerisasi Akuntansi</option>
    </select>
    @error('jurusan')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" required>
    </div>
    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" required>
    </div>
    <div class="form-group">
        <label for="no_telp">No Telp</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp', $mahasiswa->no_telp) }}" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        @if ($mahasiswa->foto)
            <div>
                <img src="{{ asset('storage/'.$mahasiswa->foto) }}" width="100" alt="Foto Mahasiswa">
            </div>
        @endif
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
