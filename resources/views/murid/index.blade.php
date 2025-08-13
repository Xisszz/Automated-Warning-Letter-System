{{-- resources/views/murid/index.blade.php --}}
@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Murid</h4>
            <a href="{{ route('murid.create') }}" class="btn btn-primary">
                Tambah Murid Baru
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="table-murid">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No. Telefon</th>
                        <th>ID Murid</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_murid }}</td>
                            <td>{{ optional($item->bahagian)->nama_bahagian ?? '-' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_telefon }}</td>
                            <td>{{ $item->id_murid }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                        id="actionMenu{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tindakan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $item->id }}">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('murid.edit', $item->id) }}">
                                                Ubah suai
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $item->id }}">
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
    @foreach ($murid as $item)
        <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                            Padam Murid
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda pasti mahu memadam data murid <strong>{{ $item->nama_murid }}</strong>? Tindakan ini tidak
                        boleh dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('murid.destroy', $item->id) }}" method="POST" class="d-inline">
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
