<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Request;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ProductRequestController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function borrowReq(Request $req)
    {
    	$json['inserted'] = 'false';
        $rules = [
            'lent_user' => 'required|numeric|not_in:0',
            'product_id' => 'required|numeric|not_in:0'
        ];
        $cAttributes = [
            'lent_user' => "Owner's",
            'product_id' => "Product's",
        ];
        $validator = Validator::make(Input::all(),$rules,[],$cAttributes);
        if( $validator->fails() )
            $json['error'] = $validator->errors()->first();
        else {
            $id = Auth::user()->id;
            $countData = Product::where('user_id',$id)->where('status',1)->get()->count(); 
            if($countData < 2)
                $json['error'] = 'At least add two items to send the request.';
            else {
                $checkData = Product_Request::where('borrow_user',$id)->where('lent_user',$req->lent_user)->where('product_id',$req->product_id)->where('status','!=',5)->get()->first();
                if($checkData)
                    $json['error'] = 'Request Already Sent.';
                else {
                    $data = new Product_Request();
                    $data->borrow_user = $id;
                    $data->lent_user   = $req->lent_user;
                    $data->product_id  = $req->product_id;
                    $data->save(); 
                    $json['inserted'] = 'true';
                }
            }
        }
    	return response()->json($json);
    }

    public function updateBorrowReq(Request $req)
    {
    	$json['updated'] = 'false';
    	$data = Product_Request::find($req->request_id);
        $uid = Auth::user()->id;
		if( $data != NULL && ( $data->lent_user == $uid || $data->borrow_user == $uid ) ) {
            if($data->status == 0 && ( $req->status != 1 && $req->status != 2 ) ) 
                $json['error'] = 'Pending requests can only be Accepted or Rejected.';
            else if ( $data->status == 1 && $req->status != 3 )
                $json['error'] = 'Accepted requests can only be Lend.';
            else if ( $data->status == 2 )
                $json['error'] = 'Rejected requests can not be updated.';
            else if ( $data->status == 3 && $req->status != 4 )
                $json['error'] = 'Lent requests can only be Confirm Borrowal.';
            else if ( $data->status == 4 && $req->status != 5 )
                $json['error'] = 'Confirmed Borrowal requests can only be Returned.';
            else if ( $data->status == 5 )
                $json['error'] = 'Returned requests can not be updated.';
            else {
                $old_req = Product_Request::where('product_id',$data->product_id)->where('id','!=',$data->id)->where('status','!=',0)->get()->first();
                if( $old_req )
                    $json['error'] = 'Book is already rented.';
                else {
                    $data->status = $req->status;
                    if($data->status == 3 || $data->status == 4 || $data->status == 5 ) {
                        if($data->status == 3 || $data->status == 4 ) {
                            $data->date_borrowal = date('Y-m-d H:i:s');
                            $date = explode(' ',$data->date_borrowal);
                            $json['date_borrowal'] = date("d M Y", strtotime($date[0]));
                        }

                        $prod = Product::find($data->product_id);
                        if($data->status == 4)
                            $prod->rental_count +=1;
                        else if($data->status == 5)
                            $prod->viewstatus = 1;
                        else
                            $prod->viewstatus = 0;
                        $prod->save();
                    }
                    $data->save();
                    $json['updated'] = 'true';

                }
            }
        }
        else 
            $json['error'] = 'Request not found.';

    	return response()->json($json); 
    }
}
