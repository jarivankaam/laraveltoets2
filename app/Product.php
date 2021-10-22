<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
    	return $this->hasMany('App\Type');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getPriceAttribute($value)
    {
        $discount=$value*($this->discount/100); //Kortingineuro's
        $final_price=$value-$discount; //Haalkortingafvanprijs
        return number_format($final_price,2); //Zorgaltijdvoor2decimalen
    }
}
