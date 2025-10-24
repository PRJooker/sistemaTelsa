<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areas extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    //relacion de 1 a muchos inversa
    public function departamentos(){
        return $this->belongsTo(Departamentos::class);
    }

    //relacion 1 a muchos puestos
    public function puestos(){
        return $this->hasMany(Puestos::class);
    }
}
