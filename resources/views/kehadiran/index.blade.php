@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Senarai Kehadiran Murid</h4>


            <!-- Class Filter Form -->
            <form method="GET" action="{{ route('kehadiran.index') }}" class="mb-3">
                <label for="class_filter">Pilih Kelas:</label>
                <div class="input-group">
                    <select id="class_filter" name="class_filter" class="form-control">
                        <option value="">-- Semua Kelas --</option>
                        @foreach ($availableClasses as $kelas)
                            <option value="{{ $kelas }}" {{ $selectedClass == $kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-secondary">Tapis</button>
                </div>
            </form>
        </div>

        <div class="card-body">
            @if ($murid->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>Kelas</th>
                            <th>ID Murid</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($murid as $index => $student)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $student->nama_murid }}</td>
                                <td>{{ optional($student->bahagian)->nama_bahagian ?? '-' }}</td>
                                <td>{{ $student->id_murid }}</td>
                                <td>
                                    <a href="{{ route('kehadiran.show', $student->id) }}" class="btn btn-sm btn-info">
                                        Lihat Kehadiran
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted text-center">Tiada murid ditemui untuk kelas ini.</p>
            @endif
        </div>
        <div class="d-flex justify-content-center my-3">
            <!-- ✅ Rekod Baru Button -->
            <a href="{{ route('kehadiran.create') }}" class="btn btn-primary">
                + Rekod Kehadiran Baru
            </a>
        </div>
        <div class="text-center mt-4">
            @if ($murid->isNotEmpty())
                <a href="{{ route('kehadiran.reportAll') }}" class="btn btn-info">
                    📊 Lihat Laporan Semua Kelas
                </a>
                <a href="{{ route('warning_letters.index') }}" class="btn btn-outline-dark">
                    Lihat Surat Amaran Bulan Ini
                </a>
            @else
                <p class="text-muted">Tiada murid dalam kelas ini.</p>
            @endif
        </div>

    </div>
@endsection
