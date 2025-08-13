{{-- resources/views/bahagian/index.blade.php --}}
@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daftar Kelas</h4>
            <a href="{{ route('bahagian.create') }}" class="btn btn-primary">
                Tambah Kelas Baru
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="table-bahagian">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahagians as $index => $bahagian)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $bahagian->nama_bahagian }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenu{{ $bahagian->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Tindakan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $bahagian->id }}">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('bahagian.show', $bahagian->id) }}">
                                                Butiran
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $bahagian->id }}">
                                                Padam
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- Delete Confirmation Modals --}}
    @foreach ($bahagians as $bahagian)
        <div class="modal fade" id="confirmDeleteModal{{ $bahagian->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $bahagian->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $bahagian->id }}">
                            Padam Kelas
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda pasti mahu memadam kelas <strong>{{ $bahagian->nama_bahagian }}</strong>? Tindakan ini tidak
                        boleh dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('bahagian.destroy', $bahagian->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Teruskan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
