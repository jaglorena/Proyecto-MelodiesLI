<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = "album";
    public $timestamps = false;
    protected $fillable = [
        "titulo",
        "fecha_lanzamiento",
        "artista_id",
    ];

    protected $casts = [
        "fecha_lanzamiento" => "date",
    ];
}
