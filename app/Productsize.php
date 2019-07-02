<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Productsize extends Model
{
    protected $connection = 'mysql';
    protected $table = 'product_size';
    
    protected $fillable = [
        'product_id', 'size_value'
    ];
}