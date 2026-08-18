<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'fatih@pekvera.com'],
            [
                'name' => 'Fatih PEK',
                'password' => Hash::make('Pekvera2026!'),
            ]
        );
    }
}
