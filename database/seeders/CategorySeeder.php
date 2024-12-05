<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'fantasy'
            ],
            [
                'name' => 'mistery'
            ],
            [
                'name' => 'action'
            ],
            [
                'name' => 'horror'
            ],
            [
                'name' => 'romance'
            ],
            [
                'name' => 'adventure'
            ],
            [
                'name' => 'drama'
            ],
        ];
        foreach ($category as $category) {
            Category::create($category);
        }
    }
}
