<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=order::all();
        return view('admin.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders=order::with('orderItems.products')->where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }
    public function validateOrder($id)
    {
        // Mettez à jour l'état de la commande
        $order=Order::find($id);
        $order->status = 1;
        $order->save();

        // Mettez à jour l'état du produit associé à la commande
        // $product = $order->product;
        // $product->status = 1;
        // $product->save();

        return redirect()->route('admin.orders.index')->with('success', 'La commande a été validée avec succès.');
    }
    public function cancelValidation($id)
    {
        // Mettez à jour l'état de la commande
        $order=Order::find($id);
        $order->status = 0;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'La validation de la commande a été annulée.');
    }













    // public function view(product $product)
    // {
    //     $orders = order::join('products', 'order.prod_id', '=', 'prod.id')
    //         ->join('clients', 'orders.client_id', '=', 'clients.id')
    //         ->where('prod_id', $product->id)
    //         ->select('orders.client_id', 'clients.name', 'orders.qty', 'products.price')
    //         ->get();

    //         $clientOrders = $orders->groupBy('client_id')->map(function ($clientOrders) {
    //             $total = $clientOrders->sum(function ($order) {
    //                 $quantity = is_numeric($order->qty) ? $order->qty : 1000;
    //                 $price = is_numeric($order->price) ? $order->price : 1000;

    //                 return $quantity * $price;
    //             });

    //         return [
    //             'total' => $total,
    //             'orders' => $clientOrders
    //         ];
    //     });
    //     return view('admin.orders.view',compact('product', 'clientOrders'));
    // }
}
