<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Client extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['full_name', 'phone', 'identification', 'status'];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Scope para buscar clientes por nombre completo.
     */
    public function scopeNombreCompleto($query, $nombreCompleto)
    {
        return $query->where('full_name', 'like', "%{$nombreCompleto}%");
    }

    /**
     * Scope para buscar clientes por identificación.
     */
    public function scopeIdentificacion($query, $identificacion)
    {
        return $query->where('identification', $identificacion);
    }

    /**
     * Scope para filtrar clientes por estado.
     */
    public function scopeEstado($query, $estado)
    {
        return $query->where('status', $estado);
    }

    /**
     * Obtiene el número de teléfono formateado.
     */
    public function getTelefonoFormateadoAttribute()
    {
        return $this->phone ? '+' . substr($this->phone, 0, 2) . ' ' . substr($this->phone, 2) : 'No disponible';
    }
}
