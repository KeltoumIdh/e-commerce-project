<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;
use App\Models\Cart;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutController extends Controller
{
    public function index(){
      $old_cartitems = Cart::where('id_user',Auth::id())->get();
      foreach( $old_cartitems as $item){
        if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
            $removeItem = Cart::where('id_user',Auth::id())->where('prod_id',$item->prod_id)->first();
            $removeItem->delete();
        }
      }

        $cartitems = Cart::where('id_user', Auth::id())->get();
        return view('frontend.chekout',compact('cartitems'));
    }

 


    public function pay(Request $request)
{

      $order = new Order();
      $order->id_user= Auth::id();
      $order->fname= $request->input('fname');
      $order->lname= $request->input('lname');
      $order->phone= $request->input('phone');
      $order->email= $request->input('email');
      $order->adress1= $request->input('adress1');
      $order->adress2= $request->input('adress2');
      $order->city= $request->input('city');
      $order->country= $request->input('country');

       //pour calculer le prixTotal
       $total = 0;
       $cartitems_total = Cart::where('id_user', Auth::id())->get();
       foreach($cartitems_total as $prod){
         $total += $prod->products->selling_price;
         $order->product_id = $prod->products->id;
       }
       $livraison = $request->input('livraison');
       $prixCommande = $total; 
 
       $fraisExpedition = 0;
       if ($livraison === 'privé') {
           $fraisExpedition = 120;
       } elseif ($livraison === 'express') {
           $fraisExpedition = 100;
       }elseif($livraison === 'recuperer'){
         $fraisExpedition = 0;
       }
       $tva = $prixCommande * 20 / 100;
       $prixTotal = $prixCommande + $fraisExpedition + $tva;
     
      $order->total_price = $prixTotal;
      $order-> order_tax = $prixCommande * 20 / 100;;
      $order->shipping_mode = $fraisExpedition;
      $order->tracking_num= 'KS'.rand(1111,9999);
      $order->save();
      
      $cartitems = Cart::where('id_user', Auth::id())->get();
      foreach($cartitems as $item){
        OrderItem::create([
            'order_id'=>$order->id,
            'prod_id'=> $item->prod_id,
            'qty'=> $item->prod_qty,
            'price'=>$item->products->selling_price

        ]);
        $order->product_id = $item->products->prod_id;
      }

      $request->session()->put('order_id', $order->id);
      $request->session()->put('cart_items', $cartitems);


    Stripe::setApiKey('sk_test_51NEybOG5zaZSpKTOjfyu8g6nlgEivKu8nTZlSgHesnGrKvM8cD5FzLZSuIm2JhoxJIN8Xz8pkkVtsIyHaz5v4i8F00ANpujWRC');
    
    $totalAmount = $prixTotal;

    // Convert the total amount to the smallest currency unit (cents)
    $totalAmountCents = ceil($totalAmount * 100);

    // Create a new Stripe session
    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'mad',
                    'unit_amount' =>  $totalAmountCents , 
                    'product_data' => [
                        'name' => 'Order', 
                        'images' => ['https://example.com/path/to/image'], 
                    ],
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('cancel'), 
    ]);

  

    return redirect()->to($session->url);
}


    public function succes(Request $request){
      
    $orderId = $request->session()->get('order_id');
    $cartitems = $request->session()->get('cart_items');

    if (!is_null($cartitems)) {
    foreach ($cartitems as $item) {
        $prod = Product::find($item->prod_id);
        $prod->qty -= $item->prod_qty;
        $prod->save();
    }}


    // Vider le panier
    Cart::where('id_user', Auth::id())->delete();
    //envoi du facture par mail
    $order = Order::find($orderId);
    Mail::to($order->email)->send(new InvoiceEmail($order));

    // Supprimer les informations de la session
    $request->session()->forget('order_id');
    $request->session()->forget('cart_items');

    return redirect()->route('facture', ['id' => $orderId])->with('status', 'Votre commande a été passée avec succès.');


      
    }
    public function show($id)
    {
        $order = Order::find($id);
    
        return view('frontend.facture', ['order' => $order]);
    }

   
 
}
