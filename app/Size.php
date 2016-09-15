<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 9/13/16
 * Time: 4:22 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function product(){
        return $this->hasMany('App\Product');
    }

    public function price(){
        return $this->belongsTo('App\Price');
    }
}