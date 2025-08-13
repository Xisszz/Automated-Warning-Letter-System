@extends('layouts.mantis')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Form Data Guru</h4>
                <div>
                    <a href="{{ route('guru.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card=body">
                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group my-2">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru"
                            class="form-control @error('nama_guru')
                            is-invalid

                        @enderror"
                            value="{{ old('nama_guru') }}" autofocus>
                        @error('nama_guru')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="bahagian_id">Bahagian Guru</label>
                        <select name="bahagian_id" id="bahagian_id"
                            class="form-control @error('bahagian_id')
                            is-invalid

                        @enderror">
                            <option value="">Pilih Bahagian</option>
                            @foreach ($bahagians as $bahagian)
                                <option value="{{ $bahagian->id }}"
                                    {{ old('bahagian_id') == $bahagian->id ? 'selected' : '' }}>
                                    {{ $bahagian->nama_bahagian }}</option>
                            @endforeach
                        </select>
                        @error('bahagian_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email')
                            is-invalid

                        @enderror"
                            value="{{ old('email') }}" autocomplete="off">
                        @error('email')
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
                        <label for="no_telefon">No.Telefon</label>
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
                        <label for="id_guru">Id Guru</label>
                        <input type="number" name="id_guru" id="id_guru"
                            class="form-control @error('id_guru')
                            is-invalid

                        @enderror"
                            value="{{ old('id_guru') }}">
                        @error('id_guru')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="foto">Gambar Guru</label>
                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid
                        @enderror">
                        @error('gambar')
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
