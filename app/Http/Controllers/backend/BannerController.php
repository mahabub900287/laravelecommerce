<?php

namespace App\Http\Controllers\backend;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Banner::all();
        $datatrashed=Banner::onlyTrashed()->get();
        return view('backend.banner.index',compact('datas','datatrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.banner.create');
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
            "title"=>'required',
            "photo"=>"required|mimes:png,jpg,jpeg,gif,webp|max:1024",
    ]);
        $photo=$request->file('photo');
        $photo_name=Str::slug($request->title).'-'.time().'.'.$photo->getClientOriginalExtension();
        $upload_photo=$photo->move(public_path('storage/banner/'),$photo_name);
        if($upload_photo){
            $insert=new Banner();
            $insert->title=$request->title;
            $insert->discription=$request->discription;
            $insert->photo=$photo_name;
            $insert->save();
            Alert::success('Congrats', 'Banner Added Successfull');
            return redirect(route('backend.banner.create'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $photo=$request->file('photo');
        if($request->hasFile('photo')){
            $photo_name=Str::slug($request->title).'-'.time().'.'.$photo->getClientOriginalExtension();
            $upload_photo=$photo->move(public_path('storage/banner/'),$photo_name);
            $destation=public_path('storage/banner/').$banner->photo;
            if(File::exists($destation)){
                File::delete($destation);
            }
        }else{
            $photo_name=$banner->photo;
        }
            $banner->title=$request->title;
            $banner->discription=$request->discription;
            $banner->photo=$photo_name;
            $banner->save();
            Alert::success('Congrats', 'Banner Added Successfull');
            return back();
   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //     $destation=public_path('storage/banner/').$banner->photo;
        //     if(File::exists($destation)){
        //         File::delete($destation);
        // }
        $banner->status=2;
        $banner->save();
        $banner->delete();
        Alert::success('Banner Delete Successfull');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function status(Banner $banner)
    {
     if($banner->status==1){
         $banner->status=2;
         $banner->save();
         Alert::success('Successfull', 'Banner Status  Deactive ');

     }else{
          $banner->status=1;
          $banner->save();
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
         $data=Banner::onlyTrashed()->where('id',$id)->first();
         $data->status=1;
         $data->restore();
         return back();

    }
    public function harddelete($id)
    {
        $data=Banner::onlyTrashed()->where('id',$id)->first();
        $destation=public_path('storage/banner/').$data->photo;
         if(File::exists($destation)){
         File::delete($destation);
         }
         $data->forceDelete();
         return back();
    }
}
