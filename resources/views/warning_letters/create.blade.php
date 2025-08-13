@extends('layouts.mantis')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Cipta Warning Letter</h4>
                <div>
                    <a href="{{ route('warning_letters.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('warning_letters.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="murid_id">Murid</label>
                        <select name="murid_id" id="murid_id" class="form-control">
                            @foreach ($murids as $murid)
                                <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="letter_content">Isi Kandungan Surat</label>
                        <textarea name="letter_content" id="letter_content" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="issued_date">Hari</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Cipta</button>
                </form>

            </div>
        </div>
    </div>
@endsection
