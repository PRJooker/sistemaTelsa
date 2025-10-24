<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaGasto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categoria_gastos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    // Relación: una categoría tiene muchos tipos de gastos
    public function tipos()
    {
        return $this->hasMany(TipoGasto::class, 'categoria_gasto_id');
    }
}
