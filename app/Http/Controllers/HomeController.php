<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order ;
use App\Comment ;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::select(["products.id", "title", "products.price", "description","image",
            "discounts.price as discountprice"])
            ->orderBy("products.updated_at","DESC")
            ->leftjoin("discounts","products.discount_id","=","discounts.id")
            ->limit(9)->get();
        $statistics = [
            "countProducts"=>Product::count(),
            "sells"=>Order::count(),
            "clientSatisfaction"=>Comment::avg("rating")
        ];
        return view("welcome", compact("products","statistics"));
    }
}
