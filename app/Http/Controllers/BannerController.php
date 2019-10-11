<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\banner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    
 
    public function index()
    {

      $banners = Banner::get();
      return view('pages.BannerManagement.index',compact('banners'));
    }

   
    public function create()
    {
       return view('pages.BannerManagement.create');
    }

   
    public function store(Request $request)
    {
        $data        = $request->all();
        $bannername  = $data['bannername'];
        $banner = new banner;
        if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $bannername.'.'.$extension;
                    $banner_path = 'images/frontendimage/banners/'.$fileName;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                    $banner->banner_name = $fileName; 
                }
            }
            $banner->banner_url=$banner_path;
            $banner->save();
           return redirect()->route('banner.index')
                         ->with('success','Banner added successfully .');
    }
    public function edit($id)
    {
      $banner      = banner::find($id);
      $banner_name = explode('.',$banner->banner_name)[0];  
      return view('pages.BannerManagement.edit',compact('banner','banner_name'));

    }

    public function update(Request $request, $id)
    {  
        $data = $request->all();
        if(empty($data['bannername'])){
            $bannername='';
        }
        
        if(empty($data['image']))
        {
            $oldimage=banner::find($id);
            $banner_path = $oldimage->banner_url;
        }
      
        $banner = new banner;
        if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $data['bannername'].'.'.$extension;
                    $banner_path = 'images/frontendimage/banners/'.$fileName;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                }
            }
            Banner::where('id',$id)->update(['banner_name'=>$data['bannername'],'banner_url'=>$banner_path]);

            return redirect()->route('banner.index')
                         ->with('success','Banner has been edited Successfully.');
           
    }

  
    public function destroy($id)
    {
       $banner = banner::find($id); 
       $banner_path = explode('/', $banner->banner_url)[3];
       unlink(public_path() .'/'. $banner->banner_url);
       banner::where(['id'=>$id])->delete();

       return redirect()->route('banner.index')
                         ->with('success','Banner has been deleted successfully.');

    }
}
