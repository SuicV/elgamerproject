<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["client_id","order_code","products","total_price"];
    protected $casts = ["products"=>"array"];
    public function client(){
        return $this->belongsTo("\App\Client", "client_id");
    }
}
