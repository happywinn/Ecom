<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;


class RatingController extends Controller
{
    public function add(Request $req)
    {
    	$stars_rated = $req->input('product_rating');
    	$product_id = $req->input('product_id');

    	$product_check = Product::where('id',$product_id)->where('status','0')->first();
    	if($product_check)
    	{
			/* join() - Inner Join Clause
					  - accepts multiple parameters and,
						first parameter as table name,
						and rest are columns constraints.
					  - You may even join multiple tables in a single query ...
				INNER JOIN - Table နှစ်ခုလုံးမှာ အချက်အလက်တွေအစုံအလင်ရှိမှ ယူပေးမှာ ဖြစ်ပါတယ်,မရှိတဲ့ Record တွေကိုချန်ထားခဲ့မှာပါ ...
				*/
    		$verified_purchase = Order::where('orders.user_id',Auth::id())
    		->join('order_items','orders.id','order_items.order_id')
    		->where('order_items.prod_id',$product_id)->get();

    		if($verified_purchase->count() > 0)
    		{	
    			$existing_rating = Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();

    			if($existing_rating)
    			{
    				$existing_rating->stars_rated = $stars_rated;
    				$existing_rating->update();
    			}
    			else
    			{
    				Rating::create([
    					'user_id' => Auth::id(),
    					'prod_id' => $product_id,
    					'stars_rated' => $stars_rated
    				]);
    			}

    			return redirect()->back()->with('status',"Thank you for Rating this product");
    		}
    		else
    		{
    			return redirect()->back()->with('status',"You cannot rate a product without purchase");
                // return response()->json(['status'=>"You cannot rate a product without purchase"]);
    		}
    	}
    	else
    		{
    			return redirect()->back()->with('status',"No Such Product are available");
    		}
    }
}
