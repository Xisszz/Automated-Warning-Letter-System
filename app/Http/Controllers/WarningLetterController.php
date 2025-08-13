<?php

namespace App\Http\Controllers;

use App\Models\WarningLetter;
use App\Models\Murid;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\WarningLetterMail;




class WarningLetterController extends Controller
{
    // Show all warning letters
    public function index()
    {
        // Get only this month's warning letters
        $letters = WarningLetter::with('murid')
            ->whereMonth('issued_date', Carbon::now()->month)
            ->orderBy('issued_date', 'desc')
            ->get();

        return view('warning_letters.index', compact('letters'));
    }

    // Show the form to create a new warning letter
    public function create()
    {
        $murids = Murid::all(); // Get all students
        return view('warning_letters.create', compact('murids')); // Pass to the view
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'murid_id' => 'required|exists:murids,id', // References 'id' from 'murids'
            'letter_content' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        // Create a new warning letter
        WarningLetter::create([
            'murid_id' => $request->murid_id, // Foreign key references the 'id' of the 'murids' table
            'letter_content' => $request->letter_content,
            'issued_date' => $request->issued_date,
        ]);

        return redirect()->route('warning_letters.index');
    }




    // Show the details of a specific warning letter
    public function show($id)
    {
        $letter = WarningLetter::with('murid')->findOrFail($id); // Eager load 'murid' relationship
        return view('warning_letters.show', compact('letter'));
    }

    public function downloadPdf($id)
    {
        // Retrieve the letter by ID
        $letter = WarningLetter::findOrFail($id);

        // Load the view and pass the letter content
        $pdf = FacadePdf::loadView('warning_letters.pdf', compact('letter'));

        // Download the PDF file
        return $pdf->download('warning_letter_' . $letter->id . '.pdf');
    }

    public function sendEmail(WarningLetter $warningLetter): RedirectResponse
    {
        Mail::to($warningLetter->murid->email)
            ->send(new WarningLetterMail($warningLetter));

        return redirect()
            ->back()
            ->with('success', 'Surat amaran telah dihantar melalui email.');
    }
}
