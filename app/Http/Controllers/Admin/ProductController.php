<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function add()
    {
        $category = Category::all();
        $brands = Brand::all();
    	return view('admin.product.add',compact('category','brands'));	
    }
    public function insert(Request $req)
    {
        $products = new Product();
		if($req->hasFile('image'))
		{
			$file = $req->file('image');
			$ext = $file->getClientOriginalExtension();
			$filename = time().'.'.$ext;
			$destinationPath = 'assets/uploads/product/';
			$file->move($destinationPath, $filename);
			$products->image = $filename; 
		}
		$products->cate_id = $req->input('cate_id');
		$products->name = $req->input('name');
		$products->type = $req->input('type');
		//$products->brand = $req->input('brand');
		$products->small_description = $req->input('small-description');
		$products->description = $req->input('description');
		$products->original_price = $req->input('original-price');
		$products->selling_price = $req->input('selling-price');
		$products->tax = $req->input('tax');
		$products->qty = $req->input('quantity');
		$products->discount = $req->input('discount');
		$products->status = $req->input('status') == TRUE?'1':'0';
		$products->trending = $req->input('trending') == TRUE?'1':'0';
		$products->new_arrival = $req->input('new_arrival') == TRUE?'1':'0';
		$products->meta_title = $req->input('meta_title');
		$products->meta_keywords = $req->input('meta_keywords');
		$products->meta_description = $req->input('meta_description');
		$products->save();
		return redirect('products')->with('status','Product Added Successfully');
    }

    public function edit($id)
    {
    	$category = Category::all();
   		$brands = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit',compact('product','category','brands'));
    }
    public function update(Request $req,$id)
    {
        $products = Product::find($id);
		if($req->hasFile('image'))
		{
			$path = 'assets/uploads/product/'.$products->image;
			if(File::exists($path))
			{
				File::delete($path);
			}
			$file = $req->file('image');
			$ext = $file->getClientOriginalExtension();
			$filename = time().'.'.$ext;
			$file->move('assets/uploads/product/', $filename);
			$products->image = $filename; 
		}
		$products->name = $req->input('name');
		$products->type = $req->input('type');
		//$products->brand = $req->input('brand');
		$products->small_description = $req->input('small-description');
		$products->description = $req->input('description');
		$products->original_price = $req->input('original-price');
		$products->selling_price = $req->input('selling-price');
		$products->tax = $req->input('tax');
		$products->qty = $req->input('quantity');
		$products->discount = $req->input('discount');
		$products->status = $req->input('status') == TRUE?'1':'0';
		$products->trending = $req->input('trending') == TRUE?'1':'0';
		$products->meta_title = $req->input('meta_title');
		$products->meta_keywords = $req->input('meta_keywords');
		$products->meta_description = $req->input('meta_description');
		$products->update();
		return redirect('products')->with('status','Product Updated Successfully');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        if($products->image)
        {
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $products->delete();
            return redirect('products')->with('status','Product Deleted Successfully');
        }
    }
}
