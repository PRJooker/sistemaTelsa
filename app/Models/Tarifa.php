<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarifa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tarifas';

    protected $fillable = [
        'ruta_id',
        'tipo_transporte_id',
        'monto',
        'usuario_creo',
        'usuario_actualizo',
    ];

    // Relación con Ruta
    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    // Relación con TipoTransporte
    public function tipoTransporte()
    {
        return $this->belongsTo(TipoTransporte::class, 'tipo_transporte_id');
    }

    // Usuario que creó la tarifa
    public function usuarioCreador()
    {
        return $this->belongsTo(User::class, 'usuario_creo');
    }

    // Usuario que actualizó la tarifa
    public function usuarioActualizo()
    {
        return $this->belongsTo(User::class, 'usuario_actualizo');
    }
}
