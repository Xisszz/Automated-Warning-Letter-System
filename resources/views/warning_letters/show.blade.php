@extends('layouts.mantis')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Warning Letter Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Student:</strong>
                {{ $letter->murid ? $letter->murid->nama_murid : 'No student found' }}
            </p>
            <p><strong>Letter Content:</strong> {{ $letter->letter_content }}</p>
            <p><strong>Issued Date:</strong> {{ $letter->issued_date }}</p>

            <div class="mt-3">
                <a href="{{ route('warning_letters.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
