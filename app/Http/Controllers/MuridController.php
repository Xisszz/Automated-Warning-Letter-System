<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use App\Models\Kehadiran;
use App\Models\Murid;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class MuridController extends Controller
{
    // Correct query to retrieve Murids along with their Bahagian
    public function index(Request $request)
    {
        $selectedClass = $request->input('class_filter');

        $muridQuery = Murid::with('bahagian');

        if ($selectedClass) {
            $muridQuery->whereHas('bahagian', function ($query) use ($selectedClass) {
                $query->where('nama_bahagian', $selectedClass);
            });
        }

        $murid = $muridQuery->get();
        $availableClasses = ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5', 'Tahun 6'];

        return view('murid.index', compact('murid', 'availableClasses', 'selectedClass'));
    }


    public function create()
    {
        $bahagians = Bahagian::all();
        return view('murid.create', compact('bahagians'));  // Removed the `bahagians` as it is not part of the schema
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_murid' => 'required',
            'bahagian_id' => 'required|exists:bahagians,id',
            'alamat' => 'required',
            'no_telefon' => 'required|numeric',
            'id_murid' => 'required|numeric|unique:murids,id_murid',
        ], [
            'nama_murid.required' => 'Nama murid perlu diisi.',
            'bahagian_id.required' => 'Kelas perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'no_telefon.required' => 'No.telefon perlu diisi.',
            'id_murid.required' => 'Id murid perlu diisi.',
        ]);

        // Create a new Murid (student) record
        Murid::create([
            'nama_murid' => $request->nama_murid,
            'bahagian_id' => $request->bahagian_id,
            'alamat' => $request->alamat,
            'no_telefon' => $request->no_telefon,
            'id_murid' => $request->id_murid,
        ]);

        // Show a success message after the student is created
        FacadesAlert::success('Berjaya', 'Data berjaya ditambahkan.');

        // Redirect to the student list
        return redirect()->route('murid.index');
    }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id); // Find the specific student
        $bahagians = Bahagian::all(); // Fetch all Bahagian records to display in the dropdown

        return view('murid.edit', compact('murid', 'bahagians')); // Pass murid and bahagians to the view
    }


    public function update(Request $request, Murid $murid)
    {
        $request->validate([
            'nama_murid' => 'required',
            'bahagian_id' => 'required|exists:bahagians,id',
            'alamat' => 'required',
            'no_telefon' => 'required|numeric',
            'id_murid' => 'required|numeric|unique:murids,id_murid,' . $murid->id,
        ], [
            'nama_murid.required' => 'Nama murid perlu diisi.',
            'bahagian_id.required' => 'Kelas perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'no_telefon.required' => 'No.telefon perlu diisi.',
            'id_murid.required' => 'Id murid perlu diisi.',
        ]);

        // Update the murid record with the validated fields
        $murid->update($request->only(['nama_murid', 'bahagian_id', 'alamat', 'no_telefon', 'id_murid']));

        FacadesAlert::success('Berjaya', 'Data berjaya dikemas kini.');
        return redirect()->route('murid.index');
    }

    public function destroy(String $id)
    {
        $murid = Murid::find($id);

        if (!$murid) {
            return redirect()->route('murid.index')->with('error', 'Murid tidak ditemukan.');
        }

        // No need to handle image file removal as 'gambar' is not part of the schema
        $murid->delete();

        FacadesAlert::success('Berjaya', 'Data berjaya dipadam.');
        return redirect()->route('murid.index')->with('success', 'Data murid telah dipadam');
    }
}
