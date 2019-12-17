<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware("isAjax")->only("search");
    }

    /**
     * Get element products page with all products in pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $req){
        $categories = Category::whereNull("parent_cat")->get();
        $products = Product::orderBy("created_at","DESC")->paginate(9);
        $prices = ["max"=>Product::max("price"),"min"=>Product::min("price")];
        if($req->ajax()){
            return $products;
        }
        return view("products.welcome",compact("categories","products","prices"));
    }


    /**
     * Get filtered products
     * @param Request $req http request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function search(Request $req){
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

            $wheres = [
                ["price", "<=", $req->get("max-price")],
                ["price", ">=", $req->get("min-price")],
            ];
            if(intval($req->get("cat")) > 0){
                $wheres[] = ["category_id", "=",$req->get("cat")];
            }
            $result = Product::select(["id", "title", "price", "description","image"])
                ->where($wheres)
                ->orderBy("updated_at","DESC");
            return $result->paginate(9);
        }
    }

    public function get($id){
        $product = Product::where("id", "=", $id)->first();
        if($product){
            $migthLove = Product::where([
                ["category_id","=", $product->category_id],
                ["id","<>",$id]
            ])->limit(4)->get();
            return view("products.details",compact("product","migthLove"));
        }
        return redirect(route("produits"));
    }
}
