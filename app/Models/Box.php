<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class Box extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'amount_total', 'user_id'];

    /**
     * Obtiene el usuario asociado a esta caja.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Scope para buscar cajas por nombre.
     */
    public function scopeNombre($query, $nombre)
    {
        return $query->where('name', 'like', "%{$nombre}%");
    }

    /**
     * Scope para buscar cajas por monto total.
     */
    public function scopeMontoTotal($query, $monto)
    {
        return $query->where('amount_total', '>=', $monto);
    }

    /**
     * Obtiene el monto total formateado como moneda.
     */
    public function getMontoFormateadoAttribute()
    {
        return number_format($this->amount_total, 2, ',', '.');
    }

}
