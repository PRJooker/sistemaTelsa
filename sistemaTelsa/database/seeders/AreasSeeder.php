<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RH\Areas;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['name' => 'Recursos Humanos'],
            ['name' => 'Tecnología de la Información'],
            ['name' => 'Marketing'],
            ['name' => 'Ventas'],
            ['name' => 'Finanzas'],
            ['name' => 'Operaciones'],
            ['name' => 'Atención al Cliente'],
            ['name' => 'Desarrollo de Producto'],
            ['name' => 'Logística']
        ];

        foreach ($areas as $area) {
            Areas::create($area);
        }
    }
}
