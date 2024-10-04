<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Inventory extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['name', 'stock', 'type_coin_id', 'amount'];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'stock' => 'integer',
        'amount' => 'decimal:2',
    ];

    /**
     * Obtiene el tipo de moneda asociado a este inventario.
     */
    public function typeCoin()
    {
        return $this->belongsTo(TypeCoin::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    /**
     * Scope para buscar inventarios por nombre.
     */
    public function scopeNombre($query, $nombre)
    {
        return $query->where('name', 'like', "%{$nombre}%");
    }

    /**
     * Scope para filtrar inventarios por stock mínimo.
     */
    public function scopeStockMinimo($query, $minimo)
    {
        return $query->where('stock', '>=', $minimo);
    }

    /**
     * Scope para filtrar inventarios por rango de precio.
     */
    public function scopeRangoPrecio($query, $min, $max)
    {
        return $query->whereBetween('amount', [$min, $max]);
    }

    /**
     * Obtiene el valor total del inventario.
     */
    public function getValorTotalAttribute()
    {
        return $this->stock * $this->amount;
    }

}
