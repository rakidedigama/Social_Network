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

    protected function Cities()
    {
    	$data = City::select('id','name')->where('status','1')->orderBy('name','Asc')->get();
    	return json_encode($data);
    }

    public function CCities($id)
    {
    	$data = City::select('id','name')->where('status','1')->where('country_id',$id)->orderBy('name','Asc')->get();
    	return json_encode($data);
    }

    public function addCities()
    {
        $cities = [ 'Helsinki','Espoo','Tampere','Vantaa','Turku','Oulu','Lahti','Kuopio','Jyväskylä','Pori','Lappeenranta','Vaasa','Kotka','Science','History','Math','Joensuu','Hämeenlinna','Porvoo','Mikkeli','Hyvinge','Järvenpää','Hyvinge','Nurmijärvi','Rauma','Lohja','Kokkola','Kajaani','Rovaniemi','Tuusula','Kirkkonummi','Seinäjoki','Kerava','Kouvola','Imatra','Nokia','Savonlinna','Riihimäki','Vihti','Salo','Kangasala'];
        $length = count($cities);

        for ($i=0; $i < $length ; $i++) { 
            $city = new City();
            $city->name = $cities[$i];
            $city->country_id = 1;
            $city->save();
        }
    }
}
