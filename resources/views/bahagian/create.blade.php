{{-- resources/views/bahagian/create.blade.php --}}
@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Tambah Kelas Baru</h4>
            <a href="{{ route('bahagian.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('bahagian.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama_bahagian">Nama Kelas</label>
                    <input type="text" name="nama_bahagian" id="nama_bahagian"
                        class="form-control @error('nama_bahagian') is-invalid @enderror" value="{{ old('nama_bahagian') }}"
                        placeholder="Masukkan nama kelas" required>
                    @error('nama_bahagian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Kelas</button>
                </div>
            </form>
        </div>
    </div>
@endsection
