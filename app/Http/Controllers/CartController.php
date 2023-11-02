<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function addProduct(Request $request){
     $product_id = $request->input('product_id');
     $product_qty = $request->input('product_qty');

     if(Auth::check()){
        $prod_check = Product::where('id',$product_id)->first();

        if($prod_check){
            if(Cart::where('prod_id',$product_id)->where('id_user',Auth::id())->exists()){
                return response()->json(['status' => $prod_check->name." déja exist au panier"]);
            }
            else{
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->id_user = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name." Ajouter au panier"]);
            }
            
        }
     }
     else{
        return response()->json(['status' => "connectez-vous"]);
     }

   }
   public function viewcart(){
      $cartitems = Cart::where('id_user',Auth::id())->get();
      return view('frontend.cart',compact('cartitems'));
   }

   public function updateCart(Request $request){
      $prod_id = $request->input('prod_id');
      $product_qty = $request->input('prod_qty');

      if(Auth::check()){
       
         if(Cart::where('prod_id',$prod_id)->where('id_user', Auth::id())->exists())
         {
             $cart = Cart::where('prod_id',$prod_id)->where('id_user', Auth::id())->first();
             $cart->prod_qty = $product_qty;
             $cart->update();
             return response()->json(['status' => "la quantite est mis a jour!"]);
         }

   }}

   public function deleteprod(Request $request){
      
      if(Auth::check()){
        $prod_id = $request->input('prod_id');
        if(Cart::where('prod_id',$prod_id)->where('id_user', Auth::id())->exists())
        {
            $cart_item = Cart::where('prod_id',$prod_id)->where('id_user', Auth::id())->first();
            $cart_item->delete();
            return response()->json(['status' => "Le produit a été supprimé"]);
        }
      } 
      else{
        return response()->json(['status' => "connectez-vous"]);
     }
   }
}
