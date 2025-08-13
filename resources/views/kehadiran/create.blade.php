{{-- resources/views/kehadiran/create.blade.php --}}
@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Rekod Kehadiran Murid</h4>

            {{-- Class Filter Form --}}
            <form method="GET" action="{{ route('kehadiran.create') }}" class="d-flex">
                <select name="class_filter" class="form-control me-2">
                    <option value="">-- Semua Kelas --</option>
                    @foreach ($availableClasses as $kelas)
                        <option value="{{ $kelas }}" {{ $selectedClass === $kelas ? 'selected' : '' }}>
                            {{ $kelas }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">Tapis</button>
            </form>
        </div>

        <div class="card-body">
            <form action="{{ route('kehadiran.store') }}" method="POST">
                @csrf

                {{-- Date Picker --}}
                <div class="mb-4">
                    <label for="date" class="form-label">Tarikh Kehadiran</label>
                    <input type="date" id="date" name="date"
                        class="form-control @error('date') is-invalid @enderror" required
                        value="{{ old('date', now()->toDateString()) }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Students Table for Selected Class --}}
                @if (empty($selectedClass))
                    <p class="text-center text-muted">Sila pilih kelas untuk memaparkan murid.</p>
                @else
                    <h5>Kelas: {{ $selectedClass }}</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th>Nama Murid</th>
                                <th>Status</th>
                                <th>Alasan (jika Lain-lain)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filtered = $murid->filter(
                                    fn($m) => optional($m->bahagian)->nama_bahagian === $selectedClass,
                                );
                            @endphp
                            @forelse ($filtered as $i => $student)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $student->nama_murid }}</td>
                                    <td>
                                        <select name="status[{{ $student->id }}]"
                                            class="form-control @error('status.' . $student->id) is-invalid @enderror"
                                            required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="present"
                                                {{ old('status.' . $student->id) == 'present' ? 'selected' : '' }}>
                                                Hadir
                                            </option>
                                            <option value="absent"
                                                {{ old('status.' . $student->id) == 'absent' ? 'selected' : '' }}>
                                                Tidak Hadir
                                            </option>
                                            <option value="late"
                                                {{ old('status.' . $student->id) == 'late' ? 'selected' : '' }}>
                                                Lewat
                                            </option>
                                            <option value="other"
                                                {{ old('status.' . $student->id) == 'other' ? 'selected' : '' }}>
                                                Lain-lain
                                            </option>
                                        </select>
                                        @error('status.' . $student->id)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" name="status_custom[{{ $student->id }}]"
                                            class="form-control @error('status_custom.' . $student->id) is-invalid @enderror"
                                            placeholder="Nyatakan alasan jika Lain-lain"
                                            value="{{ old('status_custom.' . $student->id) }}">
                                        @error('status_custom.' . $student->id)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Tiada murid ditemui untuk kelas ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif

                {{-- Submit --}}
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Rekod Kehadiran</button>
                </div>
            </form>
        </div>
    </div>
@endsection
