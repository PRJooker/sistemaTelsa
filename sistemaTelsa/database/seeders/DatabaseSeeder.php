<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RH\Departamentos;
use App\Models\RH\Puestos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Oscar',
            'email' => 'prueba@email.com',
            'password' => bcrypt('12345678'),
        ]);
        $this->call([
            AreasSeeder::class
        ]);

        Departamentos::factory(11)->create();
        Puestos::factory(20)->create();
    }
}
