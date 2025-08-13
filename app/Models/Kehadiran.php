<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = ['id_murid', 'date', 'status'];

    // Define the relationship with the Murid (Student) model
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }
}
