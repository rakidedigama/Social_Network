<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
    	$data = Product::where('status','1')->orderBy('id','DESC')->get();
    	return json_encode($data);
    }

    public function getProducts($id)
    {
    	$data = Product::where('status','1')->where('user_id',$id)->orderBy('id','DESC')->get();
    	return json_encode($data);
    }
}
