<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latestProduct = Product::orderBy("created_at","DESC")->get()->take(9);
        return view("welcome", compact("latestProduct"));
    }
}
