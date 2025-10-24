<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RH\Areas;

class Departamentos extends Model
{
    use softDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id'
    ];
    //relacion 1 a muchos
     //relacion de 1 a muchos inversa
    public function area(){
        return $this->belongsTo(Areas::class);
    }

    public function puesto(){
        return $this->hasMany(Puestos::class);
    }
}
