<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Brand;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Session;
use View;



class FrontendController extends Controller
{
    

    public function index() {
        $featured_products = Product::inRandomOrder()->get();
        /* compact()  __ given variable ကို array အဖစ် convert လုပ်ပေး, 
						 အာ့ array ထဲမှာ key က variable ရဲ့ name ဖစ်ပီးတော့ 
						 အာ့ key ရဲ့ value က အာ့ variable ရဲ့ တန်ဖိုးဖစ်မယ် ...
            */

        $popular_categories = Category::where('popular', 1)
                                ->take(3)
                                ->inRandomOrder()
                                ->get();

        $discount_products = Product::whereNotNull('discount')->get();

        return view('frontend.index',compact('featured_products','discount_products','popular_categories'));
    }


    public function collection() {
        $collections = Category::all();
        return view('frontend.collection',compact('collections'));
    }



    public function productview($cate_name,$prod_type, $prod_name){
        /*
            where() 
                basically အရ, where() method မှာ 3 arguments လိုမယ် ...
			    1st argument က  column ရဲ့ name,
			    2nd argument က operator ဖစ်မယ် (database က supported လုပ်တဲ့ operator တခုခု )
			    3th argument က column ရဲ့ value နဲ့ နှိုင်းယှဉ်မယ့် value ဖစ်မယ် ...

                တကယ်လို့ column က given value နဲ့ ကိုက်ညီရင်, 
                အာ့ value ကိုဘဲ column အဖစ်နဲ့ pass ပေးလို့ရတယ်,
			    Laravel က '=' operator ကို သုံးတယ်လို့ ယူဆသွားမယ် ..
          first()  - to return the first record found from the database ...
          exists()  - ရှိမရှိစစ် (true or false) ပြန် ...
        */
        if(Category::where('name',$cate_name)->exists())
    	{
    		if(Product::where('name',$prod_name)->exists())
    		{
    			$product = Product::where('name',$prod_name)->first();
                if($product->discount != null)
                {
                    //(1 - ($this->discount/100)) * $this->price

                    $discount_price = (1- (intval($product->discount)/100)) * $product->original_price;
                }
                else
                {
                    $discount_price = 0;
                }
                $related_products = Product::where('type',$prod_type)->where('name','!=',$prod_name)->inRandomOrder()->take(5)->get();
                $ratings = Rating::where('prod_id',$product->id)->get();
                $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('prod_id',$product->id)->get();
                if($ratings->count() > 0)
                {
                    $rating_value = $rating_sum/$ratings->count();
                }
                else
                {
                    $rating_value = 0;
                }
    			return view('frontend.product.detailview',compact('related_products','product','ratings','rating_value','user_rating','discount_price','reviews'));
                
    		}
    		else
    		{
    			return redirect('/')->with('status',"Product not found");
    		}
    	}
    	else
    	{
    		//return redirect('/')->with('status',"No such category found");
            return redirect('/');
    	}
    }




    public function sidebarCategory(Request $request, $category)
    {
         if($request->ajax()) {
            $start = $request->start;  // min price 
            $end = $request->end;  // max price value
            $checked_item = $request->check_data;
            //echo $checked_item;

            $brands = Brand::all();
            $category = Category::where('name',$category)->firstOrFail();
            if($checked_item == 'normal')
            {

                $selected_brands = Brand::where('cate_id',$category->id)->get();
                $featured_products = Product::where('cate_id',$category['id'])->get();
                //echo json_encode([$featured_products,$category,$brands]);
                
            }
            elseif($checked_item != null)
            {

                $selected_brands = Brand::where('cate_id',$category->id)->get();
                $brandId = Brand::where('name',$checked_item)->firstOrFail();
                $featured_products = Product::where('cate_id',$category['id'])
                ->where('brand_id', $brandId['id'])
                ->orderby('selling_price','ASC')
                ->get();
            }

            
            else
            {
                $selected_brands = Brand::where('cate_id',$category->id)->get();
                $featured_products = Product::where('cate_id',$category['id'])
                    ->where('selling_price', '>=', $start)->where('selling_price', '<=', $end)
                    ->orderby('selling_price','ASC')
                    ->get();
            }

            // return view('frontend.sidebar-products',compact('featured_products','category','brands'));
            // return View::make('frontend.partials.product-filter',compact('featured_products','category','brands'));
            //return $featured_products;
            echo json_encode([$featured_products,$category,$selected_brands]);
            //echo json_encode($category);
            //echo json_encode($featured_products);
            
         }
         else {
                 
                 $category = Category::where('name',$category)->firstOrFail();
                 $brands = Brand::where('cate_id',$category->id)->get();
                 $featured_products = Product::where('cate_id',$category['id'])->get();
                 return view('frontend.sidebar-products',compact('featured_products','category','brands'));
         }
        
    }





   
    public function subCategory($cate,$sub_cate)
    {
        $category = Category::where('name',$cate)->firstOrFail();
    	$featured_products = Product::where('cate_id',$category->id)
            ->findorFail($sub_cate)->get();
    	return view('frontend.sidebar-products',compact('featured_products'));
    }

    public function productlistAjax() {
        $products = Product::where('status','0')->get();
        $data = [];

        foreach($products as $item) {
                $data[] = $item['name'];
        }
        return $data;
    }



    public function searchProduct(Request $request) 
    {
         $query = $request->input('product_name');
          $featured_products = Product::where('name','LIKE','%'.$query.'%')
                ->orWhere('type','LIKE','%'.$query.'%')
                ->orWhere('small_description','LIKE','%'.$query.'%')
                ->orWhere('description','LIKE','%'.$query.'%')->get();


          return view('frontend.search-results',compact('featured_products','query'));
         
    }

}
