<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Product;
use Auth;

class ProductController extends Controller
{
    public function getProducts()
    {
    	$data = Product::where('status','1')->orderBy('id','DESC')->get();
    	return json_encode($data);
    }

    public function getProductsUser($id)
    {
    	$data = Product::where('status','1')->where('user_id',$id)->orderBy('id','DESC')->get();
    	return json_encode($data);
    }

    public function addProduct(Request $req)
    {
        $rules = [
            'name'=>'required|string|max:60|min:3',
            'sub_category_id'=>'required|integer',
            'image'=>'required|mimes:jpeg,jpg,png'  
        ];

        $validator = Validator::make(Input::all(),$rules);

        if( $validator->fails() )
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        else
        {
            $product = new Product();
            $product->name = $req->name;
            $product->sub_category_id = $req->sub_category_id;
            $product->user_id = Auth::user()->id;
            
            //File Storage
            if( $image = $req->file('image') )
            {
                $path = public_path().'/images/uploads/';
                $filename = time().'.'.$image->getClientOriginalExtension();
                $image->move($path,$filename);
                $product->image = $filename;

                $product->save();
            }
            // else
            // {
            //     $error = array('image'=>'image is required!');
            //     return response::json(array('errors'=>$error));
            // }
        }
    }
}
