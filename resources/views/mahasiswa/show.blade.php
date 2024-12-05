@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="container">
    <h2>Detail Profil Mahasiswa</h2>
    <table class="table">
        <tr>
            <th>NIM</th>
            <td>{{ $mahasiswa->nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $mahasiswa->nama }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $mahasiswa->jurusan }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $mahasiswa->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>No Telp</th>
            <td>{{ $mahasiswa->no_telp }}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td>
                @if ($mahasiswa->foto)
                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="150">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Foto Mahasiswa" width="150">
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali ke Daftar Mahasiswa</a>
</div>
@endsection
