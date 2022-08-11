<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class BrandController extends Controller
{
        public function index()
        {
            $brands = Brand::all();
            return view('admin.brand.index',compact('brands'));
        }
        public function add()
        {
            $category = Category::all();
        	return view('admin.brand.add',compact('category'));	
        }
        public function insert(Request $req)
        {
            $brands = new Brand();
    		$brands->cate_id = $req->input('cate_id');
    		$brands->name = $req->input('name');
    		$brands->slug = $req->input('slug');
    		$brands->save();
    		return redirect('brands')->with('status','Brand Added Successfully');
        }

        public function edit($id)
        {
            $brands = Brand::find($id);
            return view('admin.brand.edit',compact('brands'));
        }
        public function update(Request $req,$id)
        {
            $brands = Brand::find($id);
    		$brands->cate_id = $req->input('cate_id');
    		$brands->name = $req->input('name');
    		$brands->type = $req->input('slug');
    		$brands->update();
    		return redirect('brands')->with('status','Brand Updated Successfully');
        }

        public function delete($id)
        {
            $brand = Brand::find($id);
            $brand->delete();
            return redirect('brands')->with('status','Brand Deleted Successfully');
            
        }
}
