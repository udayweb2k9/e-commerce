<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $connection = 'mysql';
    //protected $collection = 'products';
    protected $table = 'products';
    
    protected $fillable = [
        'name', 'status','price'
    ];
}
