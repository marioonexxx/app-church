<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
            'name' => 'Nama Sample Admin',
            'no_hp' => '081225052300',
            'alamat' => 'Jln Perumtel',
            'role' => '1',
            'foto' => null,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            ],
            [
            'name' => 'Nama Sampel Operator',
            'no_hp' => '081225052300',
            'alamat' => 'Jln Perumtel',
            'role' => '2',
            'foto' => null,
            'email' => 'operator@gmail.com',
            'password' => bcrypt('12345678'),
            ],
            [
            'name' => 'Nama Sampel Editor',
            'no_hp' => '081225052300',
            'alamat' => 'Jln Perumtel',
            'role' => '3',
            'foto' => null,
            'email' => 'editor@gmail.com',
            'password' => bcrypt('12345678'),
            ],

            
        ]);
    }
}
