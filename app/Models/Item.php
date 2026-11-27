<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan trait SoftDeletes[cite: 1]

    protected $fillable = [
        'name',
        'description',
        'stock',
    ];
}