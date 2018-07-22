<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function Cities()
    {
    	$data = City::where('status','1')->orderBy('name','Asc');
    	return json_encode($data);
    }

    public function CCities($id)
    {
    	$data = City::where('country_id',$id)->where('status','1')->orderBy('name','Asc');
    	return json_encode($data);
    }
}
