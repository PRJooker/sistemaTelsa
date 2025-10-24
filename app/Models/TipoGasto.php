<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoGasto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_gastos';

    protected $fillable = [
        'categoria_gasto_id',
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    // Relación: un tipo de gasto pertenece a una categoría
    public function categoriaGasto()
    {
        return $this->belongsTo(CategoriaGasto::class, 'categoria_gasto_id');
    }
}
