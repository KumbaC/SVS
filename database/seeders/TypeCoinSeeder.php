<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeCoin::create([
            'name' => 'Bolívar',
            'description' => 'Moneda oficial de Venezuela',
            'is_primary' => true
        ]);

        \App\Models\TypeCoin::create([
            'name' => 'Dólar',
            'description' => 'Moneda de Estados Unidos, ampliamente utilizada en transacciones internacionales',
            'is_primary' => false
        ]);

        \App\Models\TypeCoin::create([
            'name' => 'Euro',
            'description' => 'Moneda oficial de la Unión Europea',
            'is_primary' => false
        ]);

        \App\Models\TypeCoin::create([
            'name' => 'Peso Colombiano',
            'description' => 'Moneda oficial de Colombia',
            'is_primary' => false
        ]);
    }
}
