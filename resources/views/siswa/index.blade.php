@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Induk</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $item)
                <tr>
                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td><img src="{{ asset('storage/' . $item->photo) }}" width="50"></td>
                    <td>
                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('siswa.ekstrakulikuler.index', $item->id) }}" class="btn btn-info">Ekstrakulikuler</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
