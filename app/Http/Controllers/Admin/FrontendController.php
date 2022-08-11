<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class FrontendController extends Controller
{
    //
    function index()
    {
        $total_users = User::all();
        $total_categories = Category::all();
        $total_products = Product::all();
        $total_orders = Order::all();
        

        $complete_orders = Order::where('status','1')->get();

        $pending_orders = Order::where('status','0')->get();

        // if(Order::exists()) {
        // 	$orders = Order::where('status','1')->firstOrFail();
        // 	return view('admin.index',compact('total_users','total_categories','total_products','orders'));
        // }
        
        return view('admin.index',compact('total_users','total_categories','total_products','total_orders','complete_orders','pending_orders'));
    }
}
