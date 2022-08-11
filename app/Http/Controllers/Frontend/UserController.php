<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
    	$orders = Order::where('user_id',Auth::id())->get();
    	return view('frontend.orders.index',compact('orders'));
    }

    public function view($id)
    {


    	$orders = Order::where('id',$id)->where('user_id',Auth::id())->firstOrFail();

        $total = 0;
        foreach($orders->orderitems as $item) {
            if($item->products->discount != null)
            {
                //(1 - ($this->discount/100)) * $this->price
                 $total +=(1- (intval($item->products->discount)/100)) * $item->products->original_price *$item->qty;
                // $discount_price = (1- (intval($product->discount)/100)) * $product->original_price;
                
            }
            else
            {
                $total += $item->products->selling_price *$item->qty;
                $discount_price = 0;
            }
        }
    	return view('frontend.orders.view',compact('orders','total'));
    }

    public function destroy($id)
    {
        $order = Order::where('user_id',Auth::id())
                    ->where('id',$id)
                    ->first();
        $order->delete();

        return back();
    }


    public function profile()
    {
        $setting_type = 'profile';
        $user = User::find(Auth::id());
        return view('frontend.partials.profile',compact('user','setting_type'));
    }


    public function update(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            //print_r($data);

             $user = User::where('id',Auth::id())->first();
             $user->name = $request->username;
             $user->email = $request->email;
             $user->phone = $request->phone;
           
             $user->update();        }
             return response()->json(['status'=> "Account Updated."]);
    }

    public function settings($sub)
    {
        $setting_type = $sub;
        $order_address = Order::where('user_id',Auth::id())->first();
        $orders = Order::where('user_id',Auth::id())->get();
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        $user = User::find(Auth::id());

        return view('frontend.partials.profile',compact('setting_type','user','order_address','orders','wishlist'));
        
    }
}
