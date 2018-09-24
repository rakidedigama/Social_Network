<?php

use App\ProductStatus;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
        	array('name'=>'Pending','id'=>'0'),
        	array('name'=>'Accepted','id'=>'1'),
        	array('name'=>'Rejected','id'=>'2'),
            array('name'=>'Lent','id'=>'3'),
            array('name'=>'Confirm Borrowal','id'=>'4'),
            array('name'=>'Returned','id'=>'5'),

        ];

        foreach ($statuses as $val) {
        	$pstatus = new ProductStatus();
            $pstatus->id = $val['id'];
            $pstatus->name = $val['name'];
            $pstatus->save();	
        }
    }
}
