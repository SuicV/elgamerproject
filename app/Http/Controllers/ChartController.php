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
        $chartQuantities = session("chart");
        if(!empty($chartQuantities)){
            $chartProducts = Product::select("id","title", "image","price")->whereIn("id",array_keys($chartQuantities))->get();
        }
        return view("chart.welcome", compact("chartProducts","chartQuantities"));
    }

    public function store(Request $req){
        // todo : add stock quantity and verify it
        //if($req->ajax()){
            $informations = $req->only(["product_id","quantity"]);
            if(!Validator::make($informations,[
                "product_id"=>["required","numeric","exists:products,id"],
                "quantity"=>["required","numeric"]
            ])->fails()){
                session()->put("chart.".$informations["product_id"],intval($informations["quantity"]));
                return redirect(route("chart"));
            }
        //}
        return response("Bad Request",400);
    }

    public function destroy($id){

    }
}
