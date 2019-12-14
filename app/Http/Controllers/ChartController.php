<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChartController extends Controller
{
    /**
     * Get Chart view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $chartProducts = [];
        $chartQuantities = array_diff(session("chart"),["totalPrice"]);
        if(!empty($chartQuantities)){
            $chartProducts = Product::select("id","title", "image","price")->whereIn("id",array_keys($chartQuantities))->get();
        }
        return view("chart.welcome", compact("chartProducts","chartQuantities"));
    }

    public function store(Request $req){

        if($req->ajax()){
            $informations = $req->only(["product_id","quantity"]);
            if(!Validator::make($informations,[
                "product_id"=>["required","numeric","exists:products,id"],
                "quantity"=>["required","numeric"]
            ])->fails()){
                $product = Product::select("price")->where("id","=",$informations["product_id"])->first();
                $totalPrice = $product->price * $informations["quantity"] + session()->get("chart.totalPrice",0);
                session()->put("chart.totalPrice", $totalPrice);
                session()->put("chart.".$informations["product_id"],intval($informations["quantity"]));
                return response(["action"=>"OK", "totalPrice"=>session()->get("chart.totalPrice",0)], 200);
            }
        }
        return response("Bad Request",400);
    }

    public function destroy($id, Request $req){
        if($req->ajax()){
            if(session()->has("chart.$id")){
                $quantity = session("chart.$id",0);
                $price = Product::select("price")->where("id","=",$id)->first()->price;

                session()->remove("chart.$id");
                $totalPrice = intval(session()->get("chart.totalPrice",0)) - (intval($price) *$quantity);
                session()->pull("chart.totalPrice", $totalPrice);
                return response([
                    "action"=>"OK",
                ],200);
            }
        }
        return response(["action"=>"FAILD"],400);
    }
}
