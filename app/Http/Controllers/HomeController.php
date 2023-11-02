<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
   
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
     public function login(){
        return view('frontend.welcome');
     }

     public function index(){
        //nouveaux Produits
        $twoMonthsAgo = now()->subMonths(2)->format('Y-m-d');

        $newProducts = Product::where('created_at', '>=', $twoMonthsAgo)->get();
        $promoted_products = Product::where('promo', '1')->get();
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.home',compact('featured_products','trending_category','promoted_products','newProducts'));
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
           
            $products = Product::where('categ_id',$category->id)->where('status','0')->simplePaginate(8);
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('error','slug does not exists');
        }
       
    }

    //afficher les produits de chaque categorie:
    public function viewproduct($category_slug, $prod_slug){
        if(Category::where('slug',$category_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists()){
                $products= Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('products'));

            }
            else{
                return redirect('/')->with('status','the link was broken');
            }

        }else{
            return redirect('/')->with('status','no sush category found');
        }

    }

        //detail de produits de page home
         public function homeProduct($prod_slug){
        
            if(Product::where('slug',$prod_slug)->exists()){
                $products= Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view2',compact('products'));

            }
            else{
                return redirect('/')->with('status','pas de résultat');
            }

        }



        
            public function modifier()
            {
                $user = auth()->user();
                return view('frontend.modifier', compact('user'));
            }
        
            public function mettreAJour(Request $request)
            {
                $user = auth()->user();
                $validate_data = $request->validate( [
                    'name' => 'required',
                    'lname' => 'required',
                    'phone' => ['nullable', 'regex:/^06[0-9]{8}$/'],
                    'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                    'password' => 'nullable|min:8|confirmed',
                    
                ]);
               
        
                $user->name = $request->input('name');
                $user->email = $request->input('email');

                if ($request->filled('password')) {
                    $user->password = bcrypt($request->input('password'));
                }
            
               
                $user->save();
                return redirect()->route('utilisateur.modifier')->with('success', 'Vos informations ont été mises à jour avec succès.');
            }

           public function listprod(){
            $products= Product::select('name')->where('status','0')->get();

            $data = [];
            foreach ($products as $item){
                $data[] = $item['name'];
                
            }
            return $data;
           }

           protected function searchproduct(Request $request){
            $searched_product = $request->product_name;

            if($searched_product != ""){
                $product = Product::where('name','LIKE',"%$searched_product%")->first();
                if($product){
                    return redirect('category/'.$product->category->slug.'/'.$product->slug);
                }
                else{
                    return redirect()->back()->with('status','Pas de Réslultats');
                }

            }
            else{
                return redirect()->back();
            }

           }

        // page de nouveaux produits
           public function NewProducts(){
                //nouveaux Produits
        $twoMonthsAgo = now()->subMonths(2)->format('Y-m-d');

        $newProducts = Product::where('created_at', '>=', $twoMonthsAgo)->simplePaginate(8);
          return view('frontend.nouveauxProd',compact('newProducts'));
           }

        // page de  produits en promo
          public function Promo(){
            $promoted = Product::where('promo', '1')->simplePaginate(8);
            return view('frontend.promo',compact('promoted'));
         }

      
        
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('layouts.admin');
    }
    
}