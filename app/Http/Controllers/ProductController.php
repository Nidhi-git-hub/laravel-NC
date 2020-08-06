<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function addProduct(Request $request){
    	if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            $file=$request->file('image');
            $filename='image' . time().'.'.$request->image->extension();
            $file->move("uploads/product/",$filename);

            $product = new Product;
            $product->category_id =implode(',', $request->cat);
            $product->name=$data['product_name'];
            $product->code=$data['product_code'];
            if(!empty($data['product_description'])){
            	$product->description=$data['product_description'];
            }else{
            	$product->description = '';
            }
            if(!empty($data['old_product_price'])){
                $product->old_price=$data['old_product_price'];
            }else{
                $product->old_price = '';
            }
            $product->price=$data['product_price'];
            $product->image=$filename;
        	$product->save();
        	return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully');
        }
        //Category Checkbox Menu Code
        $categories=Category::where(['parent_id'=>0])->get();
        $category_checkbox = "<label>Under Category</label>";
        foreach ($categories as $cat) {
            $category_checkbox.="<br><input type='checkbox' name='cat[]' value = '".$cat->id."'  diasabled>".$cat->name;
            $sub_category = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_category as $sub_cat){
                $category_checkbox.="<br><input type='checkbox' name='cat[]' value = '".$sub_cat->id."'  diasabled>&nbsp;--&nbsp".$sub_cat->name;
            }
        }
        //Category Dropdown Menu Code
        // $category = Category::where(['parent_id'=>0])->get();
        // $category_dropdown = "<option value = '' selected diasabled>Select</option>";
        // foreach($category as $cat){
        //     $category_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
        //     $sub_category = Category::where(['parent_id'=>$cat->id])->get();
        //     foreach($sub_category as $sub_cat){
        //         $category_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
        //     }
        // }
    	return view('Admin.Product.addProduct')->with(compact('category_checkbox'));
    }
    public function viewProducts(){
    	$products = Product::get();
    	return view('Admin.Product.viewProducts')->with(compact('products'));
    }
    public function editProduct(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if (empty($data['product_description'])) {
                $data['product_description'] = '';
            }
            if (empty($data['old_product_price'])) {
                $data['old_product_price'] = '';
            }
            if($request->hasFile('image')){

                $file=$request->file('image');
                $filename='image'.time().'.'.$request->image->extension();
                $file->move("uploads/product/",$filename);
    
                $product=Product::find($request->id);
                $product->category_id =implode(',', $request->cat);
                $product->name=$request->product_name;
                $product->code=$request->product_code;
                $product->description=$request->product_description;
                $product->old_price=$request->old_product_price;
                $product->price=$request->product_price;
                $product->image=$filename;
                $updated=$product->save();
            }else{
                $product=Product::find($request->id);
                $product->category_id =implode(',', $request->cat);
                $product->name=$request->product_name;
                $product->code=$request->product_code;
                $product->description=$request->product_description;
                $product->old_price=$request->old_product_price;
                $product->price=$request->product_price;
                $updated=$product->save();
            }
            return redirect('/admin/view-products')->with('flash_message_success','Product has been updated');
        }
        $productDetails = Product::where(['id'=>$id])->first();

        //Category Checkbox Menu Code
        $categories=Category::where(['parent_id'=>0])->get();
        $category_checkbox = "<label>Under Category</label>";
        foreach($categories as $cat){
            $category_checkbox.="<br><input type='checkbox' name='cat[]' value = '".$cat->id."' @if(strpos($productDetails->category_id,'".$cat->id."')!==false)checked @endif>".$cat->name;

            //Code for sub categories
            $sub_category=Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_category as $sub_cat){
                $category_checkbox.="<br><input type='checkbox' name='cat[]' value = '".$sub_cat->id."'  @if(strpos($productDetails->category_id,'".$sub_cat->id."')!==false)checked @endif>&nbsp;--&nbsp".$sub_cat->name;
            }
        }
        return view('Admin.Product.editProduct')->with(compact('productDetails','category_checkbox'));
    }
    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();

    }
    public function updateStatus(Request $request,$id=null){
        $data= $request->all(); 
        Product::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function updateFeatured(Request $request,$id=null){
        $data= $request->all(); 
        Product::where('id',$data['id'])->update(['featured_products'=>$data['status']]);
    }
}
