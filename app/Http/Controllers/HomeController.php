<?php

namespace App\Http\Controllers;

use App\City;
use App\Product;
use App\Product_Request;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCity() {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get()->first();
        return $city->name;
    }

    public function getRepo() {
        $repo['books'] = Product::where('user_id',Auth::user()->id)->where('status',1)->count();
        $repo['up_points'] = Auth::user()->up_points;
        $repo['down_points'] = Auth::user()->down_points;
        return $repo;
    }

    public function checkNotifications() {
        $id = Auth::user()->id;
        $json['receivedRequests'] = Product_Request::where('lent_user',$id)->where('status',0)->where('viewstatus',0)->count();
        return json_encode($json);
    }

    public function setNotifications() {
        $json['updated'] = 'false';
        $receivedRequests = Product_Request::select('id','viewstatus')->where('lent_user',Auth::user()->id)->where('status',0)->where('viewstatus',0)->get();
        foreach ($receivedRequests as $val) {
            $pr = Product_Request::find($val->id);
            $pr->viewstatus = 1;
            $pr->save();
        }
        $json['updated'] = 'true';
        return json_encode($json);
    }

    // Dashboard
    public function index()
    {
        return view('dashboard')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo()]);
    }

    // Owned Items
    public function owneditem()
    {
        $data = Product::select('products.id','products.image','products.user_id','products.rental_count','products.viewstatus','products.created_at as date',DB::raw('count(product__requests.id) as requests') )
        ->leftJoin('product__requests','products.id','product__requests.product_id')
        ->groupBy('products.id')
        ->where('products.status','1')->where('products.user_id',Auth::user()->id)->orderBy('products.id','DESC')->paginate(10);

        return view('owned_item')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo(),'data'=>$data]);
    }

    // Sent Requests
    public function sentReq() {
        $data = Product_Request::select('product__requests.created_at as date','product__requests.status','product__requests.product_id','products.image','users.name as user','product__requests.lent_user')
        ->join('products','product__requests.product_id','products.id')
        ->join('users','product__requests.lent_user','users.id')
        ->where('products.status','1')->where('product__requests.borrow_user',Auth::user()->id)->orderBy('product__requests.id','DESC')->paginate(10);

        return view('sent_requests')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo(),'data'=>$data]);
    }

    // Received Requests
    public function receivedReq()
    {
        $data = Product_Request::select('products.image','users.name as borrower','product__requests.id','product__requests.status','product__requests.borrow_user','product__requests.created_at as date','product__requests.product_id')
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.borrow_user')
        ->where('products.status','1')->where('product__requests.lent_user',Auth::user()->id)->orderBy('product__requests.id','DESC')->paginate(10);
              
        return view('received_requests')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo(),'data'=>$data]);
    }

    // Rentals
    public function rentals()
    {
        $data = Product_Request::select('products.image','users.name as borrower','product__requests.borrow_user','product__requests.id as request_id','product__requests.date_borrowal','product__requests.due_date','product__requests.product_id','product__requests.status')
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.borrow_user')
        ->where('products.status','1')->whereNotIn('product__requests.status',[0,1,2])
        ->where('product__requests.lent_user',Auth::user()->id)->orderBy('product__requests.id','DESC')->paginate(10);

        return view('rentals')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo(),'data'=>$data]);
    }

    // Borrowals
    public function borrowals()
    {
        $data = Product_Request::select('products.image','products.name','products.author','users.name as lenter','product__requests.lent_user','product__requests.id as request_id','product__requests.date_borrowal','product__requests.due_date','product__requests.product_id','product__requests.status',DB::raw('count(ratings.id) as ratings'))
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.lent_user')
        ->leftJoin('ratings','product__requests.id','ratings.request_id')
        ->where('products.status','1')->whereNotIn('product__requests.status',[0,1,2])
        ->groupBy('product__requests.id')
        // ->where('ratings.borrow_user',Auth::user()->id)
        ->where('product__requests.borrow_user',Auth::user()->id)->orderBy('product__requests.id','DESC')->paginate(10);
              
        return view('borrowals')->with(['city'=>$this->getCity(),'repo'=>$this->getRepo(),'data'=>$data]);
    }

}
