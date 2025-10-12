<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdViaje';
    public $timestamps = false;

    protected $fillable = [
        'Origen',
        'Destino',
        'FlagActivo',
        'FlagBorradoLogico',
        'UserCreacion',
        'FechaCreacion',
        'UserModificacion',
        'FechaModificacion',
    ];

    // ---------- Accessors ----------
    
    // Para mostrar FlagActivo como 'Sí' o 'No' en la vista
    public function getFlagActivoTextAttribute()
    {
        return $this->FlagActivo ? 'Sí' : 'No';
    }

    // Para mostrar FlagBorradoLogico como 'Sí' o 'No' en la vista
    public function getFlagBorradoLogicoTextAttribute()
    {
        return $this->FlagBorradoLogico ? 'Sí' : 'No';
    }

    // Formatear FechaCreacion
    public function getFechaCreacionFormattedAttribute()
    {
        return $this->FechaCreacion ? $this->FechaCreacion->format('d/m/Y H:i') : null;
    }

    // Formatear FechaModificacion
    public function getFechaModificacionFormattedAttribute()
    {
        return $this->FechaModificacion ? $this->FechaModificacion->format('d/m/Y H:i') : null;
    }

    // ---------- Mutators ----------
    
    public function setFlagActivoAttribute($value)
    {
        $this->attributes['FlagActivo'] = (bool) $value;
    }

    public function setFlagBorradoLogicoAttribute($value)
    {
        $this->attributes['FlagBorradoLogico'] = (bool) $value;
    }

}
