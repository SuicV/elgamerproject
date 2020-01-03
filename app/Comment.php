<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ["name","email","comment","product_id","rating"];
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
