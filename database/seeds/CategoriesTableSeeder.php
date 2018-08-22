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
        //creation de 5 catégories 
        factory(App\Category::class, 5)->create(); 
    }
}
