<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
    	if($request->isMethod('post')){
    		$data=$request->all();
    		$category= new Category;
    	    $category->name=$request->category_name;
    	    $category->parent_id=$request->parent_id;
            $category->url=$request->category_url;
    	    $category->description=$request->category_description;
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category has been added successfully');
    	}
    	$levels = Category::where(['parent_id'=>0])->get();
    	return view('Admin.Category.addCategory')->with(compact('levels'));
    }
    public function viewCategories()
    {
        $categories=Category::all();
        return view('Admin.Category.viewCategories')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $category = $request->all();
            $category=Category::find($request->id);
            $category->name=$request->category_name;
            $category->parent_id=$request->parent_id;
            $category->url=$request->category_url;
            $category->description=$request->category_description;
            $updated=$category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category has been updated');
        }
        $category=Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('Admin.Category.editCategory')->with(compact('category','levels'));
    }
    public function deleteCategory($id=null){
        Category::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();
    }
    public function updateStatus(Request $request,$id=null){
        $data= $request->all(); 
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
