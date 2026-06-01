<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::create([
            'nama_brand' => 'Toyota'
        ]);

        Brand::create([
            'nama_brand' => 'Honda'
        ]);

        Brand::create([
            'nama_brand' => 'BMW'
        ]);

        Brand::create([
            'nama_brand' => 'Mercedes'
        ]);
    }
}