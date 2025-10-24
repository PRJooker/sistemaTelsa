<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RH\Departamentos;

class Puestos extends Model
{
    use softDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion_puesto',
        'num_plazas',
        'salario_puesto',
        'departamento_id',
    ];
    //relacion 1 a muchos departamentos
    public function departamento(){
        return $this->belongsTo(Departamentos::class);
    }

}
