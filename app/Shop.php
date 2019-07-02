<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $connection = 'mysql';
    protected $table = 'products';
    
    protected $fillable = [
        'name', 'status','price'
    ];
}
