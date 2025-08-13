@extends('layouts.mantis')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Data Murid</h4>
                <div>
                    <a href="{{ route('murid.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card=body">
                <form action="{{ route('murid.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group my-2">
                        <label for="nama_murid">Nama Murid</label>
                        <input type="text" name="nama_murid" id="nama_murid"
                            class="form-control @error('nama_murid')
                            is-invalid

                        @enderror"
                            value="{{ old('nama_murid') }}" autofocus>
                        @error('nama_murid')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="bahagian_id">Kelas</label>
                        <select name="bahagian_id" id="bahagian_id"
                            class="form-control @error('bahagian_id') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach ($bahagians as $bahagian)
                                <option value="{{ $bahagian->id }}"
                                    {{ old('bahagian_id') == $bahagian->id ? 'selected' : '' }}>
                                    {{ $bahagian->nama_bahagian }}
                                </option>
                            @endforeach
                        </select>
                        @error('bahagian_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="form-control @error('alamat')
                            is-invalid

                        @enderror"
                            value="{{ old('alamat') }}">
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="no_telefon">No.Telefon Ibu/Ayah</label>
                        <input type="number" name="no_telefon" id="no_telefon"
                            class="form-control @error('no_telefon')
                            is-invalid

                        @enderror"
                            value="{{ old('no_telefon') }}">
                        @error('no_telefon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="id_murid">Id Murid</label>
                        <input type="number" name="id_murid" id="id_murid"
                            class="form-control @error('id_murid')
                            is-invalid

                        @enderror"
                            value="{{ old('id_murid') }}">
                        @error('id_murid')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="my-2 d-flex justify-content-end">
                        <button class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
