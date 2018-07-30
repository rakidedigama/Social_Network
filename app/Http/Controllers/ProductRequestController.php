<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Request;
use App\Product;
use Auth;


class ProductRequestController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function borrowReq(Request $req)
    {
    	$json['inserted'] = 'false';

        $id = Auth::user()->id;
        $countData = Product::where('user_id',$id)->where('status',1)->where('viewstatus',1)->get()->count(); 
        
        if($countData < 2)
            $json['errorr'] = 'Add 2 items to send the request.';
        else
        {
        	$checkData = Product_Request::where('borrow_user',Auth::user()->id)->where('lent_user',$req->lent_user)->where('product_id',$req->product_id)->get();
        	if($checkData->first())
        		$json['error'] = 'Request Already Sent.';
        	else
        	{
    	    	$data = new Product_Request();
    			$data->borrow_user = Auth::user()->id;
    	    	$data->lent_user   = $req->lent_user;
    			$data->product_id  = $req->product_id; 
    	    	$data->save(); 
    	    	$json['inserted'] = 'true';
        	}
        }
    	return response()->json($json);
    }

    public function updateBorrowReq(Request $req)
    {
    	$json['updated'] = 'false';
    	$data = Product_Request::find($req->request_id);
		$data->status = $req->status;
    	$data->save();
    	$json['updated'] = 'true';
    	return response()->json($json); 
    }
}
