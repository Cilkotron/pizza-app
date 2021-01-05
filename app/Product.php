<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $filiable = ['imagePath', 'name', 'description', 'price'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
