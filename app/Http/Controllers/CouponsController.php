<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Cart;
use View;
use Auth;

class CouponsController extends Controller
{


    public function coupons() {
      $coupons = Coupon::all();
      // retun view('frontend.orders.index',compact('orders'));
      return view('admin.coupon.index',compact('coupons'));
      //return $coupons;
    }

    public function add()
    {
      $coupons = Coupon::all();
      return view('admin.coupon.add',compact('coupons')); 
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function insert(Request $req)
    {
      $coupons = new Coupon();
      $coupons->code = $req->input('code');
      $coupons->type = $req->input('coupon_type');
      $coupons->value = $req->input('coupon_value');
      $coupons->expiry_date = $req->input('expiry_date');
      $coupons->status = $req->input('status') == TRUE?'1':'0'; // input checkbox 
      $coupons->save();
      return redirect('coupons')->with('status','Coupon Added Successfully');

    }


    public function update(Request $req,$id)
    {
      $coupon = Coupon::find($id);
      $coupon->code = $req->input('code');
      $coupon->type = $req->input('coupon_type');
      $coupon->value = $req->input('coupon_value');
      $coupon->expiry_date = $req->input('expiry_date');
      $coupon->status = $req->input('status') == TRUE?'1':'0'; // input checkbox 
      $coupon->update();
      return redirect('coupons')->with('status','Coupon Updated Successfully');

      //return $req->input('coupon_type');
    }


    public function delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('coupons')->with('status','Coupon Deleted Successfully');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $coupon = Coupon::where('code',$request->coupon_code)->first();

       // //dd($coupon);
       // if(!$coupon) 
       // {
       //     return redirect()->route('checkout.index')->with('error','Invalid coupon code. Please try again.');
       // }
       // session()->put('coupon',[
       //      'name' => $coupon->code,
       //       'discount' => $coupon->value,
       // ]);

       // return redirect()->route('checkout.index');
       // return redirect()->route('checkout.index')->with('status','Coupon has been applied');
       //return session()->get('coupon');

      if($request->ajax()) {
        $data = $request->all();
        //print_r($data);
        $couponCount = Coupon::where('code',$data['code'])->count();
        if($couponCount == 0) {
          return response()->json(
            [ 
              'status'=>false,
              'message'=>'This coupon is not valid.',
              'view'=>View::make('frontend.checkout')]);
        }else {
          // Check for other coupon conditions

          //Get Coupon Details
          $couponDetails = Coupon::where('code',$data['code'])->first();

          //check if coupon is Inactive
          if($couponDetails->status ==0) {
            $message = 'This coupon is not actived';
          }

          //check if coupon is Expired 
          $expiry_date = $couponDetails->expiry_date;
          $current_date = date('Y-m-d');
          if($expiry_date < $current_date) {
            $message = 'This coupon is expired.';
          }

          //To Calculate the total price
          $total = 0;
          $cartitems_total = Cart::where('user_id', Auth::id())->get();
          foreach($cartitems_total as $prod)
          {
            $total += (1- (intval($prod->products->discount)/100)) * $prod->products->original_price * $prod->prod_qty;
          }

          if(isset($message)) {
            
            return response()->json(
              [ 
                'status'=>false,
                'message'=>$message,
                'view'=>View::make('frontend.checkout')
              ]);
          }else {
            //Session::put('couponCode',$data['code']);
            session()->put('coupon',[
                 'cu_id' => $couponDetails->id,
                 'name' => $couponDetails->code,
                  'discount' => $couponDetails->value,
            ]);

            $message = "Coupon code Successfully applied.";
            return response()->json(
              [ 
                'status'=>true,
                'message'=>$message,
                'code' => $couponDetails->code,
                'discount' => $couponDetails->value,
                'total' => $total - $couponDetails->value,
                'view'=>View::make('frontend.checkout')
              ]);
          }
        }
      }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        

      if($request->ajax()) {
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
          $total += (1- (intval($prod->products->discount)/100)) * $prod->products->original_price * $prod->prod_qty;
        }

        session()->forget('coupon');

        return response()->json(
          [ 
            'total' => $total,
            'view'=>View::make('frontend.checkout')
          ]);
        // return redirect()->route('checkout.index')->with('suscess_message','Coupon has been removed.');
      }
      else
      {
          session()->forget('coupon');
          return redirect()->route('checkout.index')->with('suscess_message','Coupon has been removed.');
      }
    }
}
