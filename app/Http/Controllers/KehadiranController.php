<?php

namespace App\Http\Controllers;

use App\Mail\WarningLetterMail;
use App\Models\Murid;
use App\Models\Kehadiran;
use App\Models\WarningLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $selectedClass   = $request->input('class_filter');
        $availableClasses = ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5', 'Tahun 6'];

        $muridQuery = Murid::with('bahagian');
        if ($selectedClass) {
            $muridQuery->whereHas(
                'bahagian',
                fn($q) =>
                $q->where('nama_bahagian', $selectedClass)
            );
        }
        $murid = $muridQuery->get();

        return view('kehadiran.index', compact(
            'murid',
            'availableClasses',
            'selectedClass'
        ));
    }

    public function create(Request $request)
    {
        $availableClasses = ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5', 'Tahun 6'];
        $selectedClass    = $request->query('class_filter', '');

        $muridQuery = Murid::with('bahagian');
        if ($selectedClass) {
            $muridQuery->whereHas(
                'bahagian',
                fn($q) =>
                $q->where('nama_bahagian', $selectedClass)
            );
        }
        $murid = $muridQuery->get();

        return view('kehadiran.create', compact(
            'availableClasses',
            'selectedClass',
            'murid'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'            => 'required|date',
            'status'          => 'required|array',
            'status.*'        => 'required|string|in:present,absent,late,other',
            'status_custom'   => 'nullable|array',
            'status_custom.*' => 'nullable|string|max:255',
        ], [
            'date.required'      => 'Tarikh diperlukan.',
            'status.*.required'  => 'Sila pilih status untuk setiap murid.',
        ]);

        $date          = Carbon::parse($request->input('date'))->toDateString();
        $allStatuses   = $request->input('status');
        $customReasons = $request->input('status_custom', []);
        $absentIds     = [];

        // 1) Save each attendance and record absentees
        foreach ($allStatuses as $muridId => $stat) {
            $finalStatus = $stat === 'other'
                ? ($customReasons[$muridId] ?? 'Lain‑lain')
                : $stat;

            Kehadiran::create([
                'id_murid' => $muridId,
                'date'      => $date,
                'status'    => $finalStatus,
            ]);

            if ($stat === 'absent') {
                $absentIds[] = $muridId;
            }
        }

        // 2) Check each absentee’s monthly count and possibly issue & email a warning
        $startMonth = Carbon::now()->startOfMonth()->toDateString();
        $endMonth   = Carbon::now()->endOfMonth()->toDateString();

        foreach (array_unique($absentIds) as $muridId) {
            $countAbsent = Kehadiran::where('id_murid', $muridId)
                ->where('status', 'absent')
                ->whereBetween('date', [$startMonth, $endMonth])
                ->count();

            if ($countAbsent > 3) {
                $already = WarningLetter::where('murid_id', $muridId)
                    ->whereMonth('issued_date', Carbon::now()->month)
                    ->exists();

                if (! $already) {
                    $letter = WarningLetter::create([
                        'murid_id'       => $muridId,
                        'letter_content' => "Kehadiran kurang daripada 75% ({$countAbsent} kali tidak hadir) bulan ini.",
                        'issued_date'    => Carbon::now()->toDateString(),
                    ]);

                    // ── Send it by email ──
                    if ($letter->murid->user && $letter->murid->user->email) {
                        Mail::to($letter->murid->user->email)
                            ->queue(new WarningLetterMail($letter));
                    }
                }
            }
        }

        FacadesAlert::success(
            'Berjaya',
            'Rekod kehadiran disimpan. Surat amaran dihantar jika perlu.'
        );

        return redirect()
            ->route('kehadiran.create', [
                'class_filter' => $request->input('class_filter')
            ]);
    }

    public function show($id)
    {
        $murid = Murid::with('bahagian', 'kehadiran')->findOrFail($id);
        return view('kehadiran.show', compact('murid'));
    }

    public function edit($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        return view('kehadiran.edit', compact('kehadiran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:present,absent,late',
        ], ['status.required' => 'Sila pilih status.']);

        $record = Kehadiran::findOrFail($id);
        $record->update(['status' => $request->status]);

        FacadesAlert::success('Berjaya', 'Rekod kehadiran telah dikemaskini.');
        return redirect()->route('kehadiran.index');
    }

    public function destroy($id)
    {
        $record = Kehadiran::findOrFail($id);
        $record->delete();

        FacadesAlert::success('Berjaya', 'Rekod kehadiran telah dipadam.');
        return redirect()->route('kehadiran.index');
    }

    public function reportAll()
    {
        $classes = ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5', 'Tahun 6'];
        $grouped = [];

        foreach ($classes as $kelas) {
            $ids = Murid::whereHas(
                'bahagian',
                fn($q) =>
                $q->where('nama_bahagian', $kelas)
            )->pluck('id');

            $grouped[$kelas] = Kehadiran::with('murid')
                ->whereIn('id_murid', $ids)
                ->orderBy('date', 'desc')
                ->get();
        }

        return view('kehadiran.report_all', compact('grouped'));
    }
}
