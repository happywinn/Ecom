<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index()
    {
    	$wishlist = Wishlist::where('user_id',Auth::id())->get();
    	return view('frontend.wishlist',compact('wishlist'));
    }

    // public function add(Request $request)
    // {
    	
    //     $data = json_decode($request->getContent());
    //     foreach($data as $item) {
    //         $wish = new Wishlist();
    //         $wish->user_id = Auth::id();
    //         $wish->prod_id = $item->product_id;
    //         //$cartItem->prod_qty = $item->qty;
    //         $wish->save();
    //     }

    //     return redirect('/wishlist');
          
    // }

    // public function add(Request $req)
    // {
    //     if(Auth::check())
    //     {   
    //         $prod_id = $req->input('prod_id');
    //         if(Product::find($prod_id))
    //         {
    //             $wish = new Wishlist();
    //             $wish->prod_id = $prod_id;
    //             $wish->user_id = Auth::id();
    //             $wish->save();
    //             return response()->json(['status'=>"Product Added to Wishlist"]);
    //         }
    //         else
    //         {
    //             return response()->json(['status'=>"Product doesnot exist"]);
    //         }
    //     }
    //     else
    //     {
    //         return response()->json(['status'=>"Login to Continue"]);
    //     }
    // }



    // public function addIndex($prod_id)
    public function add(Request $req)
    {
        if(Auth::check())
        {   
            $prod_id = $req->input('prod_id');
            $prod_check = Product::where('id',$prod_id)->first();
            if(Product::find($prod_id))
            {
                if(wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->name." Already Added to wishlist."]);
                }
                else
                {
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status'=>"Product Added to Wishlist"]);
                }
            }
            else
            {
                 return response()->json(['status'=>"Product not found"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }



    public function deleteitem(Request $req)
    {
    	if(Auth::Check())
    	{
    		$prod_id = $req->input('prod_id');
    		if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
    		{
    			$wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
    			$wish->delete();
    		    return response()->json(['status'=>"Item Removed from Wishlist"]);

    		}
    	}
    	else
    	{
    		return response()->json(['status'=>"Login to Continue"]);
    	}
    }


    public function wishcount()
    {
        $wishcount = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishcount]);
    }


    public function deleteWishlistAll(Request $req)
    {
        if(Auth::Check())
        {
            $user = $req->input('user_id'); 

            if(Wishlist::where('user_id',$user)->exists())
            {
                $wishitems = Wishlist::where('user_id',$user)->delete();
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
