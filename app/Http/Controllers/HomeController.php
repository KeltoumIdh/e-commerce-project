<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
   
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     // fonction pour l'affichage du fichier index dans la page d'acceuil(affichage du slider /carroussel)
     public function index(){
        $product = Product::All();
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.home',compact('featured_products','trending_category','product'));
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

  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    
}