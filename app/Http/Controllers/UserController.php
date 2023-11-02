<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\support\facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('id_user', Auth::id())->get();
      return view('frontend.orders.index',compact('orders'));  
    }

    public function view($id){
       $orders= Order::where('id', $id)->where('id_user',Auth::id())->first();
        return view('frontend.orders.view',compact('orders'));
    }
}
