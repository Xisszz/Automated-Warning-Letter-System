{{-- resources/views/emails/warning_letter.blade.php --}}
@component('mail::message')
    # Surat Amaran Kehadiran

    **{{ $muridName }}**,
    Tarikh Dikeluarkan: {{ $letterDate }}

    {{ $letterContent }}

    Terima kasih,<br>
    Sekolah Kebangsaan Sungai Sireh
@endcomponent
