<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index(){
    	$banners= Banner::where('status','1')->orderby('sort_order','asc')->get();
    	$category= Category::with('category')->where(['parent_id'=>0])->get();
    	$products= Product::get();
    	$featuredProducts = Product::where(['featured_products'=>1])->get();
    	return view('Nicecraft.index')->with(compact('banners','category','products','featuredProducts'));
    }
}
