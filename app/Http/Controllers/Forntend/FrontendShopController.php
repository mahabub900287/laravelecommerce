<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendShopController extends Controller
{
    public function shop(){
        $shop_product=Product::with('sizes','colors','categories')->
        Select('id','slug','title','sale_price','short_discription','price','quantity','photo','status')->paginate(20);
        return view('forntend.shop.index',compact('shop_product'));
    }
    public function slow($slug){
      $product=Product::where('slug',$slug)->first();
      return view("forntend.shop.single",compact('product'));
    }
}
