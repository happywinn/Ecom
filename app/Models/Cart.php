<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
    	'user_id',
    	'prod_id',
    	'prod_qty',
    ];

    public function products()
    {
    	return $this->belongsTo(Product::class,'prod_id','id');
    }


    // public static function subtotal()
    // {
    //     $total = 0;
    //     $cartitems_total = self::where('user_id', Auth::id())->get();
    //     foreach($cartitems_total as $prod)
    //     {
    //         $total += $prod->products->selling_price * $prod->prod_qty;
    //     }
    //     $subtotal = $total;
    //     return $subtotal;
    // }
}
