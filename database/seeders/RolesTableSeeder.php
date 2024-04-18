<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::truncate();

        // Insert seed data
        Role::create([
            'id' => '1',
            'name' => 'Admin'
        ]);

        Role::create([
            'id' => '2',
            'name' => 'Customer'
        ]);
    }
}
