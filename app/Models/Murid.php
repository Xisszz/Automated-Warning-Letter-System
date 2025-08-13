<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $fillable = ['bahagian_id', 'nama_murid',  'alamat', 'no_telefon', 'id_murid'];

    protected $casts = [
        'date' => 'date',
    ];


    // Define the relationship with Kehadiran (Attendance)
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'id_murid');
    }

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'bahagian_id');
    }


    // In Murid model
    public function warningLetters()
    {
        return $this->hasMany(WarningLetter::class, 'murid_id');
    }

    // in App\Models\Murid
    public function user()
    {
        return $this->belongsTo(User::class, 'id_murid', 'guru_id');
        // or adjust the foreign key if different
    }
}
