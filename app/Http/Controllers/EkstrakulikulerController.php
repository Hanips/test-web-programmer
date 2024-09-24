<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index(Siswa $siswa)
    {
        $ekstrakulikuler = $siswa->ekstrakulikuler;
        return view('ekstrakulikuler.index', compact('siswa', 'ekstrakulikuler'));
    }

    public function create(Siswa $siswa)
    {
        return view('ekstrakulikuler.create', compact('siswa'));
    }

    public function store(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:2000|max:' . (date('Y')),
        ]);

        $validatedData['siswa_id'] = $siswa->id;
        Ekstrakulikuler::create($validatedData);

        return redirect()->route('ekstrakulikuler.index', $siswa)->with('success', 'Ekstrakulikuler berhasil ditambahkan');
    }

    public function edit(Siswa $siswa, Ekstrakulikuler $ekstrakulikuler)
    {
        return view('ekstrakulikuler.edit', compact('siswa', 'ekstrakulikuler'));
    }

    public function update(Request $request, Siswa $siswa, Ekstrakulikuler $ekstrakulikuler)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:2000|max:' . (date('Y')),
        ]);

        $ekstrakulikuler->update($validatedData);

        return redirect()->route('ekstrakulikuler.index', $siswa)->with('success', 'Ekstrakulikuler berhasil diperbarui');
    }

    public function destroy(Siswa $siswa, Ekstrakulikuler $ekstrakulikuler)
    {
        $ekstrakulikuler->delete();
        return redirect()->route('ekstrakulikuler.index', $siswa)->with('success', 'Ekstrakulikuler berhasil dihapus');
    }
}
