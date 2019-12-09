<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
class ProductsController extends Controller
{
    public function index(){
        $categories = Category::whereNull("parent_cat")->get();
        $products = Product::all()->take(15);
        return view("products.welcome",compact("categories","products"));
    }
}
