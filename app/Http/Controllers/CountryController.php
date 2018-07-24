<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;

class CountryController extends Controller
{
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }

	public function Countries()
	{
		$data = [];
		$countries = Country::select('id','name')->where('status','1')->orderBy('name','Asc')->get();
		foreach ($countries as $key=> $value) 
		{	
			$cities = City::select('id','name')->where('status','1')->where('country_id',$value['id'])->orderBy('name','Asc')->get();
			$data[$value['name']] = $cities;
		}
		return json_encode($data);
	}

	public function addCountries()
	{
		$countries = ['Finland'];
		$length    = count($countries);

		for ($i=0; $i < $length ; $i++) { 
			$country = new Country();
			$country->name = $countries[$i];
			$country->save();
		}
	}
}
