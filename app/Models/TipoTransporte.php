<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTransporte extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_transporte'; // nombre de la tabla en la base de datos

    // Los campos que se pueden llenar mediante create o update
    protected $fillable = [
        'nombre_transporte',
        'descripcion_transporte',
        'usuario_creo',
        'usuario_actualizo',
    ];

   
    protected $dates = ['deleted_at'];


    public $timestamps = true;
}
