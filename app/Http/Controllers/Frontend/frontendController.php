<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class frontendController extends Controller
{
    // fonction pour l'affichage du fichier index dans la page d'acceuil(affichage du slider /carroussel)
    public function index(){

        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('Frontend.index',compact('featured_products','trending_category'));
    }
    
    //fonction pour l'affichage de la page categories
    public function categoryfct(){
        $category = Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    //fonction pour afficher la page des produits lors de clique sur une categorie
    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists()){
           $category = Category::where('slug',$slug)->first();
            $products = Product::where('cat_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('error','slug does not exists');
        }
       
    }

}
