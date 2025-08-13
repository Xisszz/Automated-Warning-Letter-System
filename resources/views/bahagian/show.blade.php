@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Bahagian {{ $bahagian->nama_bahagian }}</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahagian->guru as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
