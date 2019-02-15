<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # création des catégories
        App\Category::create([
            'title' => 'Homme'
        ]);
        App\Category::create([
            'title' => 'Femme'
        ]);
    }
}
