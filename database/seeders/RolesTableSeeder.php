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
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Customer'
        ]);
    }
}
