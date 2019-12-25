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
        $products = $this->getProducts();
        if($req->ajax()){
            $html = view("products.inc.display_products",compact("products"))->render();
            return response()->json(["count"=>$products->count(),"html"=>$html,"links"=>$products->links()->render()]);
        }
        $categories = Category::whereNull("parent_cat")->get();
        $prices = ["max"=>Product::max("price"),"min"=>Product::min("price")];
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
        $validator = Validator::make($req->only(["max-price","min-price","cat","page","discount"]),[
            "max-price"=>["required","numeric"],
            "min-price"=>["required","numeric"],
            "page"=>["required","numeric"],
            "cat"=>$categoryVerify,
            "discount"=>["regex:/^discount$/"]
        ]);
        if(!$validator->fails()){

            $wheres = [
                ["products.price", "<=", $req->get("max-price")],
                ["products.price", ">=", $req->get("min-price")],
            ];
            if(intval($req->get("cat")) > 0){
                $wheres[] = ["category_id", "=",$req->get("cat")];
            }
            if($req->get("discount", "") !== ""){
                $wheres[] = ["products.discount_id","<>","NULL"];
            }
            // retrieving data
            $products = $this->getProducts($wheres);
            $html = view("products.inc.display_products",compact("products"))->render();
            return response()->json(["count"=>$products->count(),
                "html"=>$html,
                "links"=>$products->links()->render()
            ]);
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

    private function getProducts(Array $wheres = []){
        return Product::select(["products.id", "title", "products.price", "description","image",
        "discounts.price as discountprice"])
            ->where($wheres)
            ->orderBy("products.updated_at","DESC")
            ->leftjoin("discounts","products.discount_id","=","discounts.id")
            ->paginate(9);
    }
}
