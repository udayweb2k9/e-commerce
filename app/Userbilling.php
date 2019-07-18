<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userbilling extends Model
{
    protected $connection = 'mysql';
    protected $table = 'user_billing';
    
    protected $fillable = [
        'user_id', 
        'fname',
        'lname', 
        'address1', 
        'city', 
        'state', 
        'postal', 
        'email', 
        'phone'
    ];
}
