<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama_category' => 'SUV'
        ]);

        Category::create([
            'nama_category' => 'MPV'
        ]);

        Category::create([
            'nama_category' => 'Sedan'
        ]);

        Category::create([
            'nama_category' => 'Sport'
        ]);
    }
}