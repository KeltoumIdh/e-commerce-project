<?php

namespace App\Models;
use App\Models\OrderItems;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['id_user','product_id','fname','lname','email','phone','adress1','adress1','city','country','message','total_price','order_tax','shipping_mode','tracking_num'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPriceAttribute()
    {
        $totalPrice = $this->orderItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
         $tva = $totalPrice * 20 / 100;
        $fraisExpedition = 0;
    
        if ($this->shipping_mode === '120') {
            $fraisExpedition = 120;
        } elseif ($this->shipping_mode === '100') {
            $fraisExpedition = 100;
        } elseif ($this->shipping_mode === '0') {
            $fraisExpedition = 0;
        }
    
        return ($totalPrice + $fraisExpedition + $tva);
    }
        public function client()
        {
            return $this->belongsTo(User::class, 'id_user');
        }

        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id');
        }
        
}
