<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{


    public function addProduct(Request $req)
    {
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_qty');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check)
            {   
                /* Auth::id()  - Get the currently authenticated user's ID...  */
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->name." Already Added to cart."]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=>$prod_check->name." Added to cart."]);
                }
            }
        }
        else
        {
            
            return response()->json(['status'=>"Login to Continue"]);
            //return back()->with('status',"Login to Continue");

        }
    }

    // public function addProduct(Request $request)
    // {
      
    //     $data = json_decode($request->getContent());
    //     foreach($data as $item) {
    //         $cartItem = new Cart();
    //         $cartItem->user_id = Auth::id();
    //         $cartItem->prod_id = $item->product_id;
    //         $cartItem->prod_qty = $item->qty;
    //         $cartItem->save();
    //     }
    //     //return back()->with('status',"Carts add successfully");            
    // }


    



    public function viewcart()
    {
    	$cartitems = Cart::where('user_id',Auth::id())->get();
        $related_products = Product::inRandomOrder()->take(5)->get();
    	return view('frontend.cart',compact('cartitems','related_products'));
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }

    public function updatecart(Request $req)
    {
    	$prod_id = $req->input('prod_id');
    	$product_qty = $req->input('prod_qty');

    	if(Auth::check())
    	{
    		if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
    		{
    			$cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
    			$cart->prod_qty = $product_qty;
    			$cart->update();
    			return response()->json(['status'=>'Quantity updated']);
    		}
    	}

    }


    public function deleteProduct(Request $req)
    {
    	if(Auth::Check())
    	{
    		$prod_id = $req->input('prod_id');
    		if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
    		{
    			$cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
    			$cartItem->delete();
    		    return response()->json(['status'=>"Product Deleted Successfully"]);

    		}
    	}
    	else
    	{
    		return response()->json(['status'=>"Login to Continue"]);
    	}
    	
    }

    public function deleteProductAll(Request $req)
    {
        if(Auth::Check())
        {
            $user = $req->input('user_id'); 

            if(Cart::where('user_id',$user)->exists())
            {
                $cartitems = Cart::where('user_id',$user)->delete();
                //Cart::destroy($cartitems);
                //$cartitems->delete();
                return response()->json(['status'=>"Product Deleted Successfully"]);

            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
        return redirect('/');
        
    }


}
