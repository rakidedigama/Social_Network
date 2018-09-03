<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	"Biographies",
        	"Business",
        	"Children's",
        	"History",
        	"Religion & Spirituality",
        	"Self-Help",
        	"Literature & Fiction",
        	"Educational Textbooks",
        ];
        $length = count($categories);

        for ($i=0; $i < $length ; $i++) { 
            $category = new Category();
            $category->name = $categories[$i];
            $category->save();
    	}
    }
}
