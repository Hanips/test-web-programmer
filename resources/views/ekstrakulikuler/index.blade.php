@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ekstrakulikuler untuk {{ $siswa->first_name }} {{ $siswa->last_name }}</h1>
    <a href="{{ route('siswa.ekstrakulikuler.create', $siswa->id) }}" class="btn btn-primary">Tambah Ekstrakulikuler</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Ekstrakulikuler</th>
                <th>Tahun Mulai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ekstrakulikuler as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->start_year }}</td>
                    <td>
                        <a href="{{ route('siswa.ekstrakulikuler.edit', [$siswa->id, $item->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.ekstrakulikuler.destroy', [$siswa->id, $item->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
