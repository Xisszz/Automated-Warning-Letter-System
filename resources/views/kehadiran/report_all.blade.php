@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Laporan Kehadiran – Semua Kelas</h4>
            <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">
                ← Kembali ke Senarai
            </a>
        </div>

        <div class="card-body">
            @foreach ($grouped as $kelas => $records)
                <h5 class="mt-4">{{ $kelas }}</h5>

                @if ($records->isEmpty())
                    <p class="text-muted">Tiada rekod kehadiran untuk {{ $kelas }}.</p>
                @else
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Murid</th>
                                <th>Tarikh</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $i => $rec)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $rec->murid->nama_murid }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rec->date)->format('d-m-Y') }}</td>
                                    <td>{{ ucfirst($rec->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        </div>
    </div>
@endsection
