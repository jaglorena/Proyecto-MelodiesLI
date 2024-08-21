<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        "titulo",
        "fecha_lanzamiento",
    ] ;

    protected $casts = [
        "fecha_lanzamiento"=> "date",
     ];
}
