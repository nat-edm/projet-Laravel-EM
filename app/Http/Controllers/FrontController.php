<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    // injecter les catégories dynamiquement dans le menu pour toutes les pages
    public function __construct(){
        // premier paramètre c'est le nom de la vue puis $view c'est la vue du fichier (...)
        view()->composer('partials.menu', function($view){
             $categories = Category::pluck('title', 'id')->all();
             $view->with('categories', $categories);
        });
     }
    
    protected $paginate = 6;

    // afficher tous les produits dans la vue index.blade 
    public function index() {
        $nbproducts = Product::all()->count();
        $products = Product::paginate($this->paginate); // si pas de paginate ->get()
        return view('front.index', ['products' => $products, 'nbproducts' => $nbproducts]);
    }

    // afficher la vue show.blade
    public function show(int $id) {
        // if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $product = Product::find($id);
        return view('front.show', ['product' => $product]);
    }

    // afficher les produits par catégorie dans la vue index.blade 
    public function ProductsByCategory(int $id){
        view()->composer('partials.menu', function($view) use ($id) {
            $view->with('category_id', $id);
            });
        $category = Category::find($id);
        $nbproducts = Product::where('category_id', $id)->count();
        $products = Product::where('category_id', $id)->paginate($this->paginate);
        return view('front.index', ['products'=>$products, 'nbproducts' => $nbproducts, 'category' => $category]);
    }

    // afficher les produits en solde dans la vue index.blade
    public function ProductsOnSale(){
        // if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $nbproducts = Product::where('code', 'solde')->count();
        $products = Product::where('code', 'solde')->paginate($this->paginate);
        return view('front.index', ['products' => $products, 'nbproducts' => $nbproducts]);
    }



}
