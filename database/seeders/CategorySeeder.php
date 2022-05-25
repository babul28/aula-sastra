<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesSeeder = [
            [
                'name' => 'Puisi',
                'type' => 'artworks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cerpen',
                'type' => 'artworks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Naskah Teater',
                'type' => 'artworks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categoriesSeeder);
    }
}
