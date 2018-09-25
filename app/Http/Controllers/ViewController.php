<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index() {
	    return view('index');
	}

	public function gallery(Request $req) {
	    $search['name'] = '';
	    $search['category_id'] = '';
	    $search['sub_category_id'] = '';
	    $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name','users.city_id','users.name as owner_name','cities.name as city')
	        ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
	        ->join('users', 'products.user_id', '=', 'users.id')
	        ->join('cities','users.city_id','cities.id')
	        ->where('products.status','1')->where('products.viewstatus','1');
	        if($req->name) {
	            $data = $data->where('products.name', 'LIKE', '%'.$req->name.'%')->orWhere('cities.name', 'LIKE', '%'.$req->name.'%')->orWhere('products.author', 'LIKE', '%'.$req->name.'%');
	            array_push($search, array('name'=>$req->name));
	        }

	        if ( $req->category_id ) 
	            $data = $data->where('sub_categories.category_id', $req->category_id );

	        else if ( $req->sub_category_id ) 
	            $data = $data->where('sub_categories.id', $req->sub_category_id );

	        
	        $data=$data->orderBy('id','DESC')->paginate(16);

	        // For Search Query
	        if ( $req->category_id ) 
	            $data->appends(['category_id' => $req->category_id]);

	        else if ( $req->sub_category_id ) 
	            $data->appends(['sub_category_id' => $req->sub_category_id]);

	        if ( $req->name ) 
	            $data->appends(['name' => $req->name]);
	        

	        if( !$data->first() ) {
	            if ( $req->name || $req->category_id || $req->sub_category_id ) {
	                $data['msg'] = 'Sorry No Data Found.';
	                if ( $req->page )
	                	return abort(404);
	            }
	            else
	            	return abort(404);
	        }

	    $categories = Category::all();
	    return view('gallery')->with(['data'=>$data,'categories'=>$categories]);
	} 

	public function viewBook($id) {
	    
		if( !is_numeric($id) )
			return abort(404);

	    $book = Product::select('products.id','products.name','products.author','products.image','products.rental_count','users.name as user','users.id as user_id','cities.name as city')
	    ->join('users','products.user_id','users.id')
	    ->join('cities','users.city_id','cities.id')
	    ->where('products.id',$id)->where('products.status',1)->get()->first();
	    if( $book ) {
	    	$req_count = Product_Request::where('product_id',$book->id)->count();
	    	$ld = Product_Request::select('bdays')->where('product_id',$book->id)->whereIn('status',[3,4])->orderBy('id','DESC')->first();
	    	if( $ld ) {
	    		$lending_duration = $ld->bdays;
	    		// $lending_duration = Carbon::
	    	}
    		else
	    		$lending_duration = 0;
	    	return view('book_view')->with(['book'=>$book,'req_count'=>$req_count,'lending_duration'=>$lending_duration]);
	    }
	    else
	    	return abort(404);
	}

	public function profile($id,Request $req) {
		$user = User::select('users.id','users.name','users.pimage','cities.name as city')
		->join('cities','users.city_id','cities.id')
		->where('users.id',$id)->get()->first();

		if( empty($user) )
			return abort(404);
		
		$books = Product::select('name','image')->where('user_id',$user->id)->where('status',1)->orderBy('id','DESC')->paginate(16);

		if( !$books->first() ) {
            $books['msg'] = 'Sorry No Books Found.';
            if ( $req->page )
            	return abort(404);
        }
		return view('profile')->with(['user'=>$user,'books'=>$books]);
	}
}