<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    use HasFactory;
    protected $fillable = ['merek_baju', 'ukuran_baju', 'harga_baju', 'foto_baju'];
}
