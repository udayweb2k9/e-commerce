<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcolor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'product_color';
    
    protected $fillable = [
        'product_id', 'color_code'
    ];
}