<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','author','sub_category_id','lending_duration','image','user_id','viewstatus','status','rental_count']; 
}
