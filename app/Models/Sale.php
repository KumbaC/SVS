<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Sale extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'code',
        'client_id',
        'type_coin_id',
        'amount',
        'amount_foreign_currency',
        'exchange_rate',
        'amount_total',
        'box_id',
        'sale_date'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'amount_foreign_currency' => 'decimal:2',
        'exchange_rate' => 'decimal:4',
        'amount_total' => 'decimal:2',
        'sale_date' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function typeCoin()
    {
        return $this->belongsTo(TypeCoin::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class)->withPivot('stock', 'price');
    }

    /**
     * Scope para buscar ventas por código.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $code
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    /**
     * Scope para filtrar ventas por rango de fechas.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $startDate
     * @param string $endDate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('sale_date', [$startDate, $endDate]);
    }

    /**
     * Obtiene el total de la venta en la moneda principal.
     * 
     * @return float
     */
    public function getTotalEnMonedaPrincipalAttribute()
    {
        return $this->amount_total;
    }

    /**
     * Obtiene el total de la venta en moneda extranjera.
     * Si no existe, lo calcula usando la tasa de cambio.
     * 
     * @return float
     */
    public function getTotalEnMonedaExtranjeraAttribute()
    {
        return $this->amount_foreign_currency ?? $this->amount_total / $this->exchange_rate;
    }
}
