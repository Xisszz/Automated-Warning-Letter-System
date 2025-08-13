<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['nama_guru', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class);
    }
}
