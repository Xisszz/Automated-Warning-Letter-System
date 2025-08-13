@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Senarai Surat Amaran (Bulan Ini)</h4>
            <a href="{{ route('warning_letters.create') }}" class="btn btn-success">
                + Buat Surat Amaran Baru
            </a>
        </div>
        <div class="card-body">
            @if ($letters->isEmpty())
                <p class="text-center">Tiada surat amaran dikeluarkan bulan ini.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Murid</th>
                            <th>Kelas / Tahun</th>
                            <th>Tarikh Dikeluarkan</th>
                            <th>Kandungan Surat</th>
                            <th>Pilihan</th> {{-- New column --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($letters as $index => $letter)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $letter->murid->nama_murid }}</td>
                                <td>{{ optional($letter->murid->bahagian)->nama_bahagian ?? '—' }}</td>
                                <td>{{ \Carbon\Carbon::parse($letter->issued_date)->format('d/m/Y') }}</td>
                                <td>{{ $letter->letter_content }}</td>
                                <td>
                                    {{-- PDF button --}}
                                    <a href="{{ route('warning_letters.downloadPdf', $letter->id) }}"
                                        class="btn btn-sm btn-danger" target="_blank">
                                        PDF
                                    </a>
                                    <br><br>
                                    <a href="{{ route('warning_letters.send', $letter->id) }}"
                                        class="btn btn-sm btn-primary">
                                        Hantar Email
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
