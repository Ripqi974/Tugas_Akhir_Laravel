<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
        ]);

        // Buat Akun Admin
        User::create([
            'name' => 'Slamet Admin',
            'email' => 'admin@cibaduyut.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Buat Akun User Biasa
        User::create([
            'name' => 'Asep User',
            'email' => 'user@cibaduyut.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
    }
}