<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RH\Puestos;

class Empleados extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name',
        'apellido_ap',
        'apellido_ma',
        'curp',
        'rfc',
        'seguro_social',
        'direccion',
        'municipio',
        'estado',
        'telefono',
        'puesto_id',
    ];

    //relacion 1 a muchos puestos
    public function puesto(){
        return $this->belongsTo(Puestos::class);
    }
}
