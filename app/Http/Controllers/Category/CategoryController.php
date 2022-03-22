<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('childs')->where("parent_id","=",null)->OrderBy('created_at','DESC')->get();
        $datatrashed=Category::onlyTrashed()->get();
        return view('backend.product.categorys.index',compact('categories','datatrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>'required|unique:categories,name',
            'discription'=>'string|max:300',
            'image'=>'image|mimes:png,jpg,jpeg,webp'
        ]);
      $photo=$request->file('image');
      if(!empty($photo)){
          $img_name=Str::slug($request->name).time().'.'.$photo->getClientOriginalExtension();
          Image::make($photo)->crop(200,256)->save(public_path('storage/category/'.$img_name));
      }
      $insert=new Category();
      $insert->name=$request->name;
      $insert->parent_id=$request->parent;
      $insert->slug=Str::slug($request->name);
      $insert-> discription =$request-> discription ;
      $insert->icon=$request->icon;
      $insert->image= $img_name;
      $insert->save();
      Alert::success('Congrats', 'Banner Added Successfull');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
     {
       $s_category=Category::find($category->id);
        return view('backend.product.categorys.show',compact('s_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $data=Category::find($id);
        return view('backend.product.categorys.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            'name'=>'required',
            'discription'=>'string|max:300',
            'image'=>'image|mimes:png,jpg,jpeg,webp'
        ]);
        $photo=$request->file('image');
        if($request->hasFile('image')){
            $old_pic=Category::find($request->id);
            if( $old_pic->image != ''){
            unlink(public_path('storage/category/'.$old_pic->image));
            }
            $photo_name=Str::slug($request->name).time().'.'.$photo->getClientOriginalExtension();
            $upload_photo=Image::make($photo)->crop(200,256)->save(public_path('storage/category/'.$photo_name));
            Category::find($request->id)->update([
                'image'=>$photo_name,
            ]);
           }
          Category::find($request->id)->update([
          'name'=>$request->name,
          'parent_id'=>$request->parent,
          'slug'=>Str::slug($request->name),
          'discription'=>$request-> discription ,
          'icon'=>$request->icon,
          ]);
          return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $data=Category::find($id);
        $data->status=2;
        $data->save();
        $data->delete();
        Alert::success('Delete Product Successfull');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $banner
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
     $data=Category::find($id);
     if($data->status==1){
        $data->status=2;
        $data->save();
        Alert::success('Successfull', 'Banner Status  Deactive ');

    }else{
         $data->status=1;
         $data->save();
         Alert::success('Successfull', 'Banner Status Active ');
    }
    return back();
   }
       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
         $data=Category::onlyTrashed()->where('id',$id)->first();
         $data->status=1;
         $data->restore();
         return back();

    }
    public function harddelete($id)
    {
        $data=Category::onlyTrashed()->where('id',$id)->first();
        $destation=public_path('storage/category/').$data->photo;
         if(File::exists($destation)){
         File::delete($destation);
         }
         $data->forceDelete();
         return back();
    }
}
