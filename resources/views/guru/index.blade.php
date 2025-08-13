@extends('layouts.mantis')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Guru</h4>
                <div>
                    <a href="{{ route('guru.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No.Telefon</th>
                            <th>Id Guru</th>
                            <th>Gambar Guru</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->bahagian?->nama_bahagian }}</td>
                                <td>{{ $item->user ? $item->user->email : 'No email available' }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telefon }}</td>
                                <td>{{ $item->id_guru }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalGambar{{ $item->id }}">
                                        Lihat Gambar
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Tindakan
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('guru.edit', $item->id) }}">Ubah
                                                    suai</a>
                                            </li>
                                            <li>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal"
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
    </div>


    @foreach ($guru as $item)
        <!-- Modal -->
        <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Anda yakin mahu padam data ini?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data anda telah dipadamkan secara kekal, Tekan <b>Teruskan</b> untuk memadam data</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Teruskan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($guru as $item)
        <!-- Modal -->
        <div class="modal fade" id="modalGambar{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Guru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/gambar_guru/' . $item->gambar) }}" alt="{{ $item->gambar }}"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
