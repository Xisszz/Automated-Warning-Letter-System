<?php

namespace App\Mail;

use App\Models\WarningLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class WarningLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public WarningLetter $letter;

    /**
     * Create a new message instance.
     */
    public function __construct(WarningLetter $letter)
    {
        $this->letter = $letter;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // 1) Generate the PDF
        $pdf = Pdf::loadView('warning_letters.pdf', [
            'letter' => $this->letter,
        ])
            ->setPaper('a4', 'portrait');

        // 2) Build and return the email
        return $this
            ->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->subject('Surat Amaran Kehadiran — ' . $this->letter->murid->nama_murid)
            ->markdown('emails.warning_letter', [
                'muridName'     => $this->letter->murid->nama_murid,
                'letterDate'    => Carbon::parse($this->letter->issued_date)->format('d/m/Y'),
                'letterContent' => $this->letter->letter_content,
            ])
            ->attachData(
                $pdf->output(),
                "Surat_Amaran_{$this->letter->murid->nama_murid}.pdf",
                ['mime' => 'application/pdf']
            );
    }
}
