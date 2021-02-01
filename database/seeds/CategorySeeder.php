<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'SmartPhones',
            'description' => 'Categoría de celulares inteligentes de última generación.',
            'image' => null,
            'shop_id' => 1
        ]);
    }
}
