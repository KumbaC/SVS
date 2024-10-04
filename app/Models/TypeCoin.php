<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class TypeCoin extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'description'];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Scope para buscar monedas por nombre.
     */
    public function scopeNombre($query, $nombre)
    {
        return $query->where('name', 'like', "%{$nombre}%");
    }

    /**
     * Scope para buscar monedas por descripción.
     */
    public function scopeDescripcion($query, $descripcion)
    {
        return $query->where('description', 'like', "%{$descripcion}%");
    }

    /**
     * Obtiene el nombre en mayúsculas.
     */
    public function getNombreMayusculasAttribute()
    {
        return strtoupper($this->name);
    }
}
