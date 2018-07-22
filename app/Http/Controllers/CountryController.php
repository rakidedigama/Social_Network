<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }

   public function Countries()
    {
    	$data = Country::where('status','1')->orderBy('name','Asc');
    	return json_encode($data);
    }
}
