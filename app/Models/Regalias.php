<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalias extends Model
{
    use HasFactory;
    protected $table = "regalias";
    public $timestamps = false;
    protected $fillable = [
        "monto",
        "fecha",
    ];
    protected $casts = [
        "monto" => "float",
        "fecha" => "date",
    ];

}
