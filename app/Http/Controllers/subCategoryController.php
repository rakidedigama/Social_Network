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

}
