<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles());

        // création de 30 produits à partir de la factory et pour chacun on va faire plusieurs actions :
        factory(App\Product::class, 30)->create()->each(function($product) {
            
            # CATEGORY
            // on associe 1 categorie à 1 produit :
            $category = App\Category::find(rand(1,2));
            // on associe 1 catégorie pour chaque $product :
            $product->category()->associate($category);

            # PICTURE
            // ajout des images pour chacun des livres (il faut rester dans la fonction for each)
            $link = str_random(12) . '.jpg'; // hash de lien pour la sécurité (injection de scripts protection) et renommer l'image (pour éviter de prendre le nom d'origine)
            $file = file_get_contents('https://placeimg.com/300/300/people'); // récupérer des images de manière aléatoire
            Storage::disk('local')->put($link, $file); // sauvegarder l'image sur le disque local

            $product->update([
                'url_image'=> $link    
            ]);
            $product->save();
        });



    }
}
