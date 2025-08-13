{{-- resources/views/kehadiran/show.blade.php --}}
@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title mb-0">
                    Kehadiran: {{ $murid->nama_murid }}
                </h4>
                <small class="text-muted">
                    Kelas: {{ optional($murid->bahagian)->nama_bahagian ?? 'Tiada Kelas' }}
                </small>
            </div>
            <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">
                ← Senarai Kehadiran
            </a>
        </div>

        <div class="card-body">
            @if ($murid->kehadiran->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tarikh</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($murid->kehadiran as $i => $record)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($record->date)->format('d-m-Y') }}</td>
                                <td>{{ ucfirst($record->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted">
                    Tiada rekod kehadiran untuk murid ini.
                </p>
            @endif
        </div>
    </div>
@endsection
