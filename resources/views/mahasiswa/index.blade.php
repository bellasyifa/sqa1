@extends('layout')

@section('content')
<h1>Data Mahasiswa</h1>
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
<table class="table">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>No Telp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->jurusan }}</td>
            <td>{{ $mahasiswa->tanggal_lahir }}</td>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
            <td>{{ $mahasiswa->no_telp }}</td>
            <td>
            @if ($mahasiswa->foto)
                <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto" width="50">
            @else
                 Foto tidak tersedia
            @endif

            </td>
            <td>
            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>

<!-- Button Profil -->
            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info">Profil</a>

<!-- Button Hapus -->
            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
