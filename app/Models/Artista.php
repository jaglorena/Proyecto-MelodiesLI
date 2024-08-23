<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;
    protected $table = "artista";
    public $timestamps = false;
    protected $fillable = [
        "nombre",
        "biografia",
        "genero_id",
    ];
}
