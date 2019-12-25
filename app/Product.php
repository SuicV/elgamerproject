<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["title", "description", "image", "price", "attributes", "category_id","discount_id"];
    protected $casts = ["attributes"=>"Array"];
    public function category(){
        return $this->belongsTo("App\Category","category_id");
    }
    public function discount(){
        return $this->belongsTo('App\Discount','discount_id');
    }

    /**
     * method return price of a product or discount price if has discount
     * @param int $id id of product
     * @return int
     */
    public function getPrice(){
        if($this->discount){
            return $this->discount->price;
        }
        return $this->price;
    }
}
