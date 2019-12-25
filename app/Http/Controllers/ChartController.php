<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChartController extends Controller
{
    public function __construct(){
        $this->middleware("isAjax")->only("store","destroy");
    }
    /**
     * Get Chart view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $chartProducts = [];
        $chartQuantities = array_diff_assoc(session()->get("chart",[]), ["totalPrice"=>session()->get("chart.totalPrice",0)]);
        if(!empty($chartQuantities)){
            $chartProducts = Product::select("id","title", "image","price","discount_id")->whereIn("id",array_keys($chartQuantities))->get();
        }
        return view("chart.welcome", compact("chartProducts","chartQuantities"));
    }

    public function store(Request $req){
            $informations = $req->only(["product_id","quantity"]);
            if(!Validator::make($informations,[
                "product_id"=>["required","numeric","exists:products,id"],
                "quantity"=>["required","numeric"]
            ])->fails()){
                $price = Product::select("price","discount_id")->where("id","=",$informations["product_id"])->first()->getPrice();
                $totalPrice = session()->get("chart.totalPrice",0) - $price * session()->get("chart.".$informations["product_id"],0);
                $totalPrice += $price * $informations["quantity"];
                session()->put("chart.totalPrice", $totalPrice);
                session()->put("chart.".$informations["product_id"],intval($informations["quantity"]));
                return response(["action"=>"OK", "totalPrice"=>session()->get("chart.totalPrice",0)], 200);
            }
            return response("Bad Request",400);
    }

    public function destroy($id, Request $req){
        if(session()->has("chart.$id")){
            $quantity = session("chart.$id",0);
            $price = Product::select("price","discount_id")->where("id","=",$id)->first()->getPrice();

            session()->remove("chart.$id");
            $totalPrice = intval(session()->get("chart.totalPrice",0)) - (intval($price) *$quantity);
            session()->pull("chart.totalPrice", $totalPrice);
            return response([
                "action"=>"OK",
            ],200);
        }
        return response([
            "action"=>"FAILD",
        ],400);
    }
}
