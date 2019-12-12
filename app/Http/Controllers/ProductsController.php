<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Get element products page with all products in pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $categories = Category::whereNull("parent_cat")->get();
        $products = Product::orderBy("created_at","DESC")->paginate(9);
        $prices = ["max"=>Product::max("price"),"min"=>Product::min("price")];
        return view("products.welcome",compact("categories","products","prices"));
    }


    /**
     * Get filtered products
     * @param Request $req http request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function search(Request $req){
        if($req->ajax()) {
            $categoryVerify = ["required","numeric"];

            if(intval($req->get("cat")) > 0){
                $categoryVerify[] = "exists:categories,id";
            }
            $validator = Validator::make($req->only(["max-price","min-price","cat","page"]),[
                "max-price"=>["required","numeric"],
                "min-price"=>["required","numeric"],
                "page"=>["required","numeric"],
                "cat"=>$categoryVerify
            ]);
            if(!$validator->fails()){
                // TODO : add category filter
                $wheres = [
                    ["price", "<=", $req->get("max-price")],
                    ["price", ">=", $req->get("min-price")],
                ];
                if(intval($req->get("cat")) > 0){
                    $wheres = ["category_id", "=",$req->get("cat")];
                }
                $result = Product::where($wheres)->select(["id", "title", "price", "description","image"]);
                return $result->paginate(9);
            }
            return \response("Ooops un error occure",400);
        }
    }
}
