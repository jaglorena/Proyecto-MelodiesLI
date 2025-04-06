<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table    = "usuario";
    public $timestamps  = false;
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tipo_usuario',
        'fecha_registro',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    public function getRoleAttribute()
    {
        return $this->tipo_usuario;
    }

}
