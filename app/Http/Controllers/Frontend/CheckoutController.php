<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Coupon;


class CheckoutController extends Controller
{
    public function index()
    {
    	$cartitems = Cart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($cartitems as $item) {
            if($item->products->discount != null)
            {
                //(1 - ($this->discount/100)) * $this->price
                $total +=(1- (intval($item->products->discount)/100)) * $item->products->original_price *$item->prod_qty;
                // $discount_price = (1- (intval($product->discount)/100)) * $product->original_price;
            }
            else
            {
                $total += $item->products->selling_price *$item->prod_qty;
                $discount_price = 0;
            }
        }
    	 return view('frontend.checkout',compact('cartitems','total'));
        //return $total;
    }

    public function placeorder(Request $req)
    {

		$validator = validator(request()->all(),[
    		'fname' => 'required|alpha',  // defined rules ...
    		'lname' => 'required|alpha',
    		'email' => 'required|email',
    		'phone' => 'required|numeric|min:11',
    		'address1' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
    		'address2' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
    		'city' => 'required|regex:/^[\pL\s]+$/u|min:3',
    		'state' => 'required|regex:/^[\pL\s]+$/u|min:3',
    		'country' => 'required|regex:/^[\pL\s]+$/u|min:3',
    		'pincode' => 'required|numeric',
    		'payment_mode' => 'required',
			
    	]);

		/* 
		   back()   - user's previous location ဆီကို ပြန်သွား  ...
		    */
    	if( $validator->fails() ){
    		return back()->withErrors($validator);
    	}

    	$order = new Order();
        $order->id = Order::generateRandomNumber();
    	$order->user_id = Auth::id();
    	$order->fname = $req->input('fname');
    	$order->lname = $req->input('lname');
    	$order->email = $req->input('email');
    	$order->phone = $req->input('phone');
    	$order->address1 = $req->input('address1');
    	$order->address2 = $req->input('address2');
    	$order->city = $req->input('city');
    	$order->state = $req->input('state');
    	$order->country = $req->input('country');
    	$order->pincode = $req->input('pincode');

        $order->payment_mode = $req->input('payment_mode');
        $order->payment_id = $req->input('payment_id');

    	//To Calculate the total price
    	$total = 0;
    	$cartitems_total = Cart::where('user_id', Auth::id())->get();
    	foreach($cartitems_total as $prod)
    	{
    		$total += $prod->products->selling_price * $prod->prod_qty;
    	}
    	$order->total_price = $total - session('coupon')['discount'];

    	$order->tracking_no = 'ahsut'.rand(1111,9999);
    	$order->save();

    	$order->id;
    	$cartitems = Cart::where('user_id',Auth::id())->get();
    	foreach($cartitems as $item)
    	{
    		OrderItem::create([
    			'order_id'=>$order->id,
    			'prod_id' =>$item->prod_id,
    			'qty'=>$item->prod_qty,
    			'price'=>$item->products->selling_price,
    		]);

    		$prod = Product::where('id',$item->prod_id)->first();
    		$prod->qty = $prod->qty - $item->prod_qty;
    		$prod->update();
    	}

    	// if(Auth::user()->address1 == NULL)
    	// {
    	// 	$user = User::where('id',Auth::id())->first();
    	// 	$user->name = $req->input('fname');
    	// 	//$user->lname = $req->input('lname');
    	// 	$user->email = $req->input('email');
    	// 	$user->phone = $req->input('phone');
    	// 	$user->address1 = $req->input('address1');
    	// 	$user->address2 = $req->input('address2');
    	// 	$user->city = $req->input('city');
    	// 	$user->state = $req->input('state');
    	// 	$user->country = $req->input('country');
    	// 	$user->pincode = $req->input('pincode');
    	// 	$user->update();
    	// }
    
        $cartitems = Cart::where('user_id',Auth::id())->get();
		/* destroy() - deleting An Existing Model By Its Primary Key */
        Cart::destroy($cartitems);
        if(session()->has('coupon'))
        {
            $current_coupon = session()->get('coupon')['cu_id'];
            $coupon_delete = Coupon::where('id',$current_coupon )->firstOrFail();
            $coupon_delete->delete();
            session()->forget('coupon');
        }
        
        if($req->input('payment_mode') == "Paid by Razorpay")
        {
            return response()->json(['status' => "Order Placed Successfully"]);
        }
        return redirect('/my-orders')->with('status',"Order Placed Successfully");
    }


    public function razorpaycheck(Request $req)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }
        $firstname = $req->input('firstname');
        $lastname = $req->input('lastname');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $address1 = $req->input('address1');
        $address2 = $req->input('address2');
        $city = $req->input('city');
        $state = $req->input('state');
        $country = $req->input('country');
        $pincode = $req->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email,
            'address1' => $address1, 
            'address2' => $address2,
            'city' => $city, 
            'state' => $state, 
            'country' => $country, 
            'pincode' => $pincode,
            'total_price' => $total_price
        ]);
    }
}
