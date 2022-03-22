<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGalleries;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products=Product::with('sizes','colors','categories')->Select('id','title','sale_price','price','quantity','photo','status')->get();
      return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::OrderBy('created_at','DESC')->get();
        $sizes=Size::all();
        $colors=Color::all();
        return view('backend.product.create',compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
        "name"=>'required|unique:products,title',
        "price"=>'required|numeric',
        "quantity"=>'required|numeric',
        "sale_price"=>'numeric',
        "categories"=>'required',
        "sizes"=>'required',
        "colors"=>'required',
        'photo'=>'|image|mimes:jpg,png,webp,jpeg|max:512'
        ]);
       $photo=$request->file('photo');
       if(!empty($photo)){
             $photo_name=Str::slug($request->name).time().".".$photo->getClientOriginalExtension();
             $upload_photo=Image::make($photo)->crop(800,609)->save(public_path('storage/products/'.$photo_name));
             if($upload_photo){
             $product=new Product();
             $product->title=$request->name;
             $product->slug=Str::slug($request->name);
             $product->user_id=auth()->user()->id;
             $product->discription=$request->discription;
             $product->short_discription=$request->short_discription;
             $product->additional_info=$request->additional_info;
             $product->price=$request->price;
             $product->sale_price=$request->sale_price;
             $product->quantity=$request->quantity;
             $product->photo=$photo_name;
             $product->save();
             $product->categories()->attach($request->categories);
             $product->colors()->attach($request->colors);
             $product->sizes()->attach($request->sizes);
             }
            }
     if(isset($product->id))
     {
       $gallery_photo=$request->file('gallery_photo');
        foreach($gallery_photo as $photo){
         $gallery_photo_name=Str::slug($request->name).uniqid()."-".".".$photo->getClientOriginalExtension();
         $upload_photo=Image::make($photo)->crop(800,609)->save(public_path('storage/productgallery/'.$gallery_photo_name));
          if($upload_photo){
             $gallery=new ProductGalleries();
             $gallery->product_id =$product->id;
             $gallery->photo =$gallery_photo_name;
             $gallery->save();
         }
      }
 }
 Alert::success('Congrats', 'Product Added Successfull');
  return redirect(route('backend.product.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_product=Product::with('sizes','colors','categories')->get()->find($id);
        $gellary=ProductGalleries::where('product_id',$id)->get();
        return view('backend.product.view',compact('view_product','gellary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product=Product::find($id);
        $size=Size::all();
        $color=Color::all();
        $categories=Category::all();
        $product_gelerry=ProductGalleries::where('product_id',$id)->get();
        return view('backend.product.edit',[
            'product'=>$product,
            'size'=>$size,
            'color'=>$color,
            'categories'=>$categories,
            'product_gelerry'=>$product_gelerry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
