<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\subCategory;

class CategoryController extends Controller
{
    protected function Categories()
    {
        $data = [];
        $categories = Category::select('id','name')->where('status','1')->orderBy('name','Asc')->get();
        foreach ($categories as $key=> $value) 
        {   
            $subcategories = subCategory::select('id','name')->where('status','1')->where('category_id',$value['id'])->orderBy('name','Asc')->get();
            $data[$value['name']] = $subcategories;
        }
        return json_encode($data);
    }

}
