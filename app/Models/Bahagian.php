<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{

    protected $fillable = ['nama_bahagian'];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
    public function murid()
    {
        return $this->hasMany(Murid::class, 'bahagian_id');
    }
}
