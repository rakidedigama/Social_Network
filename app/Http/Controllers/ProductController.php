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
    public function getProducts($skip,$limit,$city_id,$sub_category_id,$name)
    {
    	$data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name','users.city_id')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->join('users', 'products.user_id', '=', 'users.id')->where('products.status','1');
      
        if(is_numeric($city_id))
            $data=$data->where('city_id',$city_id);

        if(is_numeric($sub_category_id))
            $data=$data->where('products.sub_category_id',$sub_category_id);
  
        if($name != 'null')
            $data=$data->where('products.name', 'LIKE', '%'.$name.'%');
        
        $data=$data->orderBy('id','DESC')->skip($skip)->take($limit)->get();
        
        if( !$data->first()  )
        {
            if( is_numeric($city_id) || is_numeric($sub_category_id) || $name != 'null' )
            {
                $data=array('msg'=>'Sorry No Data Found.','searched'=>'1');
            }
            else
                $data=array('msg'=>'The End.','searched'=>'0');
        }

        return json_encode($data);
    }

    public function getProductsUser($id)
    {
    	$data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->get();
    	return json_encode($data);
    }

    public function getProductsUserLimit($id,$limit)
    {
        $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->limit($limit)->get();
        return json_encode($data);
    }

    public function getProductsUserSkipLimit($id,$skip,$limit)
    {
        $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->skip($skip)->take($limit)->get();
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
