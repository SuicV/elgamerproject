<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["fullName","email","phone","address","rib"];
    protected $casts = ["rib"=>"string"];
    public function orders (){
        return $this->hasMany("\App\Order","client_id");
    }
}
