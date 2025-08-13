<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->get();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        $bahagians = Bahagian::all();
        return view('guru.create', compact('bahagians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'bahagian_id' => 'required|exists:bahagians,id',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'no_telefon' => 'required',
            'id_guru' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_guru.required' => 'Nama guru perlu diisi.',
            'bahagian_id' => 'Kelas perlu diisi.',
            'email' => 'Email perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'no_telefon.required' => 'No.telefon perlu diisi.',
            'id_guru.required' => 'Id guru perlu diisi.',
            'gambar.required' => 'Gambar perlu diisi.'
        ]);

        $gambar = $request->file('gambar');
        $fileName = Str::uuid() . '.' . $gambar->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('gambar_guru', $gambar, $fileName);

        $newRequest = $request->only(['nama_guru', 'bahagian_id', 'email', 'alamat', 'no_telefon', 'id_guru']);
        $newRequest['gambar'] = $fileName;

        $newData = Guru::create($newRequest);
        $user = User::create([
            'name' => $newData->nama_guru,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'id_guru' => $newData->id,
        ]);

        $newData->user_id = $user->id;
        $newData->save();

        FacadesAlert::success('Berjaya', 'Data berjaya ditambahkan.');

        return redirect()->route('guru.index');
    }

    public function edit(String $id)
    {
        $guru = Guru::find($id);
        $bahagians = Bahagian::all();
        return view('guru.edit', compact('guru', 'bahagians'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required',
            'bahagian_id' => 'required|exists:bahagians,id',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'no_telefon' => 'required|numeric',
            'id_guru' => 'required|numeric|unique:gurus,id_guru,' . $guru->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_guru.required' => 'Nama guru perlu diisi.',
            'bahagian_id.required' => 'Kelas perlu diisi.',
            'email' => 'Email perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'no_telefon.required' => 'No.telefon perlu diisi.',
            'id_guru.required' => 'Id guru perlu diisi.',
            'gambar.required' => 'Gambar perlu diisi.'
        ]);

        $fileName = $guru->gambar;
        $gambar = $request->file('gambar');

        if ($gambar) {
            $fileName = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('gambar_guru', $gambar, $fileName);
        }

        $newRequest = $request->except('id_guru');
        $newRequest['gambar'] = $fileName;

        $guru->update($newRequest);

        FacadesAlert::success('Berjaya', 'Data berjaya dikemas kini.');
        return redirect()->route('guru.index');
    }

    public function destroy(String $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return redirect()->route('guru.index')->with('error', 'Guru tidak ditemukan.');
        }

        if ($guru->gambar) {
            Storage::disk('public')->delete('gambar_guru/' . $guru->gambar);
        }

        $guru->delete();

        FacadesAlert::success('Berjaya', 'Data berjaya dipadam.');
        return redirect()->route('guru.index')->with('success', 'Data guru telah dipadam');
    }
}
