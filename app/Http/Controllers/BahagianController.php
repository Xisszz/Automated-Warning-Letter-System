<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use Illuminate\Http\Request;

class BahagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahagians = Bahagian::all();
        return view('bahagian.index', compact('bahagians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahagian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bahagian' => 'required|string|max:255',
        ]);

        Bahagian::create($validated);

        return redirect()
            ->route('bahagian.index')
            ->with('success', 'Kelas baru berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bahagian = Bahagian::findOrFail($id);
        // If you want to show related teachers, e.g.:
        $gurus = $bahagian->guru;

        return view('bahagian.show', compact('bahagian', 'gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bahagian = Bahagian::findOrFail($id);
        return view('bahagian.edit', compact('bahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_bahagian' => 'required|string|max:255',
        ]);

        $bahagian = Bahagian::findOrFail($id);
        $bahagian->update($validated);

        return redirect()
            ->route('bahagian.index')
            ->with('success', 'Kelas berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bahagian = Bahagian::findOrFail($id);
        $bahagian->delete();

        return redirect()
            ->route('bahagian.index')
            ->with('success', 'Kelas berjaya dipadam.');
    }
}
