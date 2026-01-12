<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // WAJIB DITAMBAHKAN BIAR BISA SIMPAN DATA
    protected $fillable = [
        'title', 
        'issuer', 
        'issued_at', 
        'description', 
        'image'
    ];
}