<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\City;
use App\Product;

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
        // $this->middleware('goodUser');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get();
        return view('dashboard')->with('city',$city[0]['name']);
    }

    public function owneditem()
    {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get();
        return view('owned_item')->with('city',$city[0]['name']);
    }

    public function lentitem()
    {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get();
        $total_products = Product::where('status',1)->where('id', Auth::user()->id )->get();
        return view('lent_item')->with('city',$city[0]['name'],'total_products',$total_products);
    }

    public function borroweditem()
    {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get();
        return view('borrowed_item')->with('city',$city[0]['name']);
    }

    public function borrowreq()
    {
        $city = City::select('name')->where('id', Auth::user()->city_id )->get();
        return view('borrowreq')->with('city',$city[0]['name']);
    }

}
