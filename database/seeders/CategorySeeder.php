<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Excavator',
                'description' => 'Alat berat untuk menggali tanah.'
            ],
            [
                'name' => 'Bulldozer',
                'description' => 'Alat berat untuk meratakan tanah.'
            ],
            [
                'name' => 'Crane',
                'description' => 'Alat berat untuk mengangkat beban.'
            ],
            [
                'name' => 'Loader',
                'description' => 'Alat berat untuk memindahkan material.'
            ],
            [
                'name' => 'Dump Truck',
                'description' => 'Kendaraan pengangkut material.'
            ],
            [
                'name' => 'Roller',
                'description' => 'Alat berat untuk pemadatan tanah.'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}