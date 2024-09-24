@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Ekstrakulikuler untuk {{ $siswa->first_name }} {{ $siswa->last_name }}</h1>
    <form action="{{ route('siswa.ekstrakulikuler.store', $siswa->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Ekstrakulikuler</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_year">Tahun Mulai</label>
            <input type="number" name="start_year" class="form-control" required min="2000" max="{{ date('Y') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
