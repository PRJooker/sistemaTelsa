<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rutas';

    protected $fillable = [
        'origen',
        'destino',
        'user_id', // <--- Agregado
    ];

    // Relación con el usuario que la creó (opcional)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

