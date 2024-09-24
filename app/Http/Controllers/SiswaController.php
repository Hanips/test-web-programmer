<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'student_id' => 'required|string|max:20|unique:siswas,student_id',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photo', 'public');
            $validatedData['photo'] = $path;
        }

        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'student_id' => 'required|string|max:20|unique:siswas,student_id,' . $siswa->id,
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($siswa->photo && Storage::exists('public/' . $siswa->photo)) {
                Storage::delete('public/' . $siswa->photo);
            }
            $path = $request->file('photo')->store('photo', 'public');
            $validatedData['photo'] = $path;
        }

        $siswa->update($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->photo && Storage::exists('public/' . $siswa->photo)) {
            Storage::delete('public/' . $siswa->photo);
        }

        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
