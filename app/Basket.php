<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
       'product_id','count','user_id'
    ];
}
