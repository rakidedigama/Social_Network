<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Request extends Model
{
    protected $fillable = ['lent_user','borrow_user','product_id','status','viewstatus','date_borrowal','due_date'];
}
