<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usershipping extends Model
{
    protected $connection = 'mysql';
    protected $table = 'user_shipping';
    
    protected $fillable = [
        'user_id', 
        'fname',
        'lname', 
        'address1', 
        'city', 
        'state', 
        'postal_code', 
        'email', 
        'phone'
    ];
}
