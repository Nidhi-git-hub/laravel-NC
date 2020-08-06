<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Banner;

class BannerController extends Controller
{
    public function banners()
    {
    	$bannerDetails = Banner::all();
    	return view('Admin.Banner.Banners')->with(compact('bannerDetails'));
    }
    public function addBanner(Request $request)
    {
    	if($request->isMethod('post')){
    		$data=$request->all();

    		$file=$request->file('image');
            $filename='image' . time().'.'.$request->image->extension();
            $file->move("uploads/banner/",$filename);

    		$banner= new Banner;
    	    $banner->name=$request->banner_name;
    	    $banner->head=$request->banner_head;
            if(!empty($data['banner_content'])){
                $banner->content=$request->banner_content;
            }else{
                $banner->content = '';
            }
            $banner->sort_order=$request->sort_order;
    	    $banner->link=$request->link;
    	    $banner->image=$filename;
            $banner->save();
            return redirect('/admin/banners')->with('flash_message_success','Banner has been added successfully');
    	}
    	return view('Admin.Banner.addBanner');
    }
    public function editBanner(Request $request,$id=null){
    	if($request->isMethod('post')){
            $data = $request->all();
            if (empty($data['banner_content'])) {
                $data['banner_content'] = '';
            }
            if($request->hasFile('image')){
                $file=$request->file('image');
                $filename='image'.time().'.'.$request->image->extension();
                $file->move("uploads/banner/",$filename);
    
                $banner=Banner::find($request->id);
                $banner->name=$request->banner_name;
    	    	$banner->head=$request->banner_head;
    	    	if(!empty($data['banner_content'])){
                $banner->content=$request->banner_content;
                }else{
                $banner->content = '';
                }
                $banner->sort_order=$request->sort_order;
    	    	$banner->link=$request->link;
    	    	$banner->image=$filename;
                $updated=$banner->save();
            }else{
                $banner=Banner::find($request->id);
                $banner->name=$request->banner_name;
    	    	$banner->head=$request->banner_head;
    	    	if(!empty($data['banner_content'])){
                $banner->content=$request->banner_content;
                }else{
                $banner->content = '';
                }
                $banner->sort_order=$request->sort_order;
    	    	$banner->link=$request->link;
                $updated=$banner->save();
            }
            return redirect('/admin/banners')->with('flash_message_success','Banner has been updated');
        }
    	$banner = Banner::where(['id'=>$id])->first();
    	return view('Admin.Banner.editBanner')->with(compact('banner'));

    }
    public function deleteBanner($id=null){
        Banner::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();

    }
    public function updateStatus(Request $request,$id=null){
        $data= $request->all(); 
        Banner::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
