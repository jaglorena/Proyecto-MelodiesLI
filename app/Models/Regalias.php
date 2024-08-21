<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalias extends Model
{
    use HasFactory;
    protected $fillable = [
        "monto",
        "fecha",
    ] ;  
    protected $casts = [
        "monto"=> "decimal",
        "fecha"=> "date",
    ];
    
}
