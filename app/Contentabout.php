<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Contentabout extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'content_about';
    
    protected $fillable = [
        'page_title', 'page_content', 'status'
    ];
}