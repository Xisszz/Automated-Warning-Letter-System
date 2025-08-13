<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarningLetter extends Model
{
    use HasFactory;
    protected $casts = [
        'issued_date' => 'date',      // casts to a Carbon instance
    ];


    // Define fillable fields
    protected $fillable = [
        'murid_id',
        'letter_content',
        'issued_date',
    ];

    // Define the relationship with the Murid model
    // In WarningLetter.php model
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'id');
    }
}
