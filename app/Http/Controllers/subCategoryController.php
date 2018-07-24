<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subCategory;

class subCategoryController extends Controller
{
    protected function subCategories($id)
    {
    	$data = subCategory::select('id','name')->where('status','1')->where('category_id',$id)->orderBy('name','Asc')->get();
    	return json_encode($data);
    }

	public function addSubCategories()
    {
        $subcategories = ['Science fiction','Satire','Drama','Action and Adventure','Romance','Mystery','Horror','Self help','Health','Guide','Travel','Children\'s','Religion, Spirituality & New Age','Science','History','Math','Anthology','Poetry','Encyclopedias','Dictionaries','Comics','Art','Cookbooks','Diaries','Journals','Prayer books','Series','Trilogy','Biographies','Autobiographies','Fantasy'];
        $length	       = count($subcategories);

        for ($i=0; $i < $length ; $i++) { 
            $subcategory = new subCategory();
            $subcategory->name = $subcategories[$i];
            $subcategory->category_id = 1;
            $subcategory->save();
    	}
	}
}
