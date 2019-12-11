<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["title", "description", "image", "price", "attributes", "category_id"];
    public function category(){
        return $this->belongsTo("App\Category","category_id");
    }
}
