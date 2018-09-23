<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // On prendra garde de bien supprimer toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());

        //creation de 20 posts 
        factory(App\Post::class, 20)->create()->each(function ($post){
            //ajout des images 
            // On utilise Futurama sur lorempiscum pour récupérer des images aléatoirement 
            // Attention il n'y en a que 9 différentes au total
            $link = str_random(12) . '.jpg'; //hash de lien pour la sécurité (injection de script de protection)
            $file = file_get_contents('http://lorempicsum.com/futurama/250/250/' . rand(1,9)); //flux
            Storage::disk('local')->put($link, $file);

            $post->picture()->create([
                'link'=>$link
            ]);

            $categories = App\Category::pluck('id')->shuffle()->slice(0, rand(1,3))->all();

            $post->categories()->attach($categories);
            $post->save();
        }); 

       
    }
}
