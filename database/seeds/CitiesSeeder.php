<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Initializing 
        $cities = [ 
        	'Helsinki',
			'Espoo',
			'Tampere',
			'Vantaa',
			'Turku',
			'Oulu',
			'Lahti',
			'Kuopio',
			'Jyväskylä',
			'Pori',
			'Lappeenranta',
			'Vaasa',
			'Kotka',
			'Joensuu',
			'Hämeenlinna',
			'Porvoo',
			'Mikkeli',
			'Hyvinge',
			'Järvenpää',
			'Nurmijärvi',
			'Rauma',
			'Lohja',
			'Kokkola',
			'Kajaani',
			'Rovaniemi',
			'Tuusula',
			'Kirkkonummi',
			'Seinäjoki',
			'Kerava',
			'ouvola',
			'Imatra',
			'Nokia',
			'Savonlinna',
			'Riihimäki',
			'Vihti',
			'Salo',
			'Kangasala',
			'Raisio',
			'Karhula',
			'Kemi',
			'Iisalmi',
			'Varkaus',
			'Raahe',
			'Ylöjärvi',
			'Hamina',
			'Kaarina',
			'Tornio',
			'Heinola',
			'Hollola',
			'Valkeakoski',
			'Siilinjärvi',
			'Sibbo',
			'Jakobstad',
			'Lempäälä',
			'Mäntsälä',
			'Forssa',
			'Kuusamo',
			'Haukipudas',
			'Korsholm',
			'Laukaa',
			'Anjala',
			'Uusikaupunki',
			'Janakkala',
			'Pirkkala',
			'Lansi-Turunmaa',
			'Lovisa',
			'Jämsä',
			'Lieto'
        ];
 
        // Adding Cities
        foreach ( $cities as $value ) { 
            $ct = new City();
            $ct->name = $value;
            $ct->country_id = 1;
            $ct->save();
    	}
    }
}
