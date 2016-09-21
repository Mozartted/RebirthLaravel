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
    protected $timestamps=false;
    
    public function product(){
        return $this->hasMany('App\Models\Product');
    }

}