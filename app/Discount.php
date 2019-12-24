<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ["price"];
    public function product (){
        return $this->hasOne("App\Proudct", "discount_id");
    }
}
