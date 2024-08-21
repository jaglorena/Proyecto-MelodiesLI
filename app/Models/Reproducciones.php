<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reproducciones extends Model
{
    use HasFactory;
    protected $fillable = [
        "cantidad_reproducciones",
        "fecha",
    ] ;
    protected $casts = [  
        "cantidad_reproduciones"=> "int",
        "fecha"=> "date",
        
    ] ;
}
