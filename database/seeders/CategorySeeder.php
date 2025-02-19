<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Database\Factories\CategoryFactory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::create([
        //     'name' => 'javascript',
        //     'name' => 'docker'
        // ]);

        // Category::factory()->count(5)->create();
        CategoryFactory::new()->count(5)->create();
    }
}
