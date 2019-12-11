<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name","parent_cat"];

    public function subCategories(){
        return $this->hasMany("App\Category","parent_cat");
    }
    public function parentCategory(){
        return $this->belongsTo("App\Category","parent_cat");
    }

    public function products(){
        return $this->hasMany("App\Product","category_id");
    }
}
