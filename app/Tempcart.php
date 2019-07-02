<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempcart extends Model
{
    protected $connection = 'mysql';
    protected $table = 'temp_cart';
    
    protected $fillable = [
        'product_id', 'size_id','color_id', 'quantity', 'user_id', 'unique_id'
    ];
}
