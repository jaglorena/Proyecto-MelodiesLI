<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    protected $table = "cancion";
    public $timestamps = false;

    protected $fillable = [
        "titulo",
        "duracion",
        "album_id",
        "artista_id",
    ];

}
