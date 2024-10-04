<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'name' => 'Gerente',
                'description' => 'Responsable de la dirección y administración general de la empresa'
            ],
            [
                'name' => 'Jefe de Ventas',
                'description' => 'Encargado de liderar y supervisar el equipo de ventas'
            ],
            [
                'name' => 'Cajero',
                'description' => 'Encargado de las ventas y cobros'
            ],
            [
                'name' => 'Analista de Recursos Humanos',
                'description' => 'Encargado de la gestión del personal y procesos de RRHH'
            ],
            [
                'name' => 'Contador',
                'description' => 'Responsable de la contabilidad y finanzas de la empresa'
            ],
            [
                'name' => 'Asistente Administrativo',
                'description' => 'Apoyo en tareas administrativas y organizativas'
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
