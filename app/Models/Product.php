<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'categ_id', 'slug', 'original_price','selling_price','promo','small_descrip','description','image','qty','tax','status','meta_title','meta_keywords','meta_descrip',
        'promotion_duration','promotion_price','promotion_created_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categ_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'product_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'prod_id');
    }
}
