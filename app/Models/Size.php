<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 9/13/16
 * Time: 4:22 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps=false;

    public $fillable=['name','percent'];
    
    public function product(){
        return $this->belongsToMany('App\Models\Product','products_sizes','size_id','product_id');

    }

}