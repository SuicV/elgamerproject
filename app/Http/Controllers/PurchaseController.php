<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeClientRequest ;
use Illuminate\Support\Facades\Hash;
use \App\Client;
use \App\Order;
use \App\Product ;
use \PDF ;
class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware("purchase");
    }

    public function index(){

        return view("purchase.welcome");
    }
    public function store(storeClientRequest $req){
        
        $informations = $req->only(["fullName","email","phone","address","rib"]);
        // redirect client if the validation is faild
        $req->validated();

        $informations["password"] = Hash::make($req->get("password",""));
        
        // update informations or create new client if doesn't exist
        $client = Client::updateOrCreate(["email"=>$informations["email"]],$informations);

        $quantities = array_diff_assoc(session()->get("chart"), ["totalPrice"=>session()->get("chart.totalPrice")]);
        $order = Order::create(["client_id"=>$client->id,
            "order_code"=> \Str::random(30),
            "products"=>$quantities,
            "total_price"=>session()->get("chart.totalPrice",0)]);

        $commandeCode = $order->order_code ;
        $products = Product::select(["title","price","id","image","discount_id"])->whereIn("id",array_keys($quantities))->get();
        $quantities = session()->get("chart",[]);
        session()->remove("chart");
        $pdf = PDF::loadView("pdf.order",compact("commandeCode","products","quantities", "client"));
        return $pdf->download("commande.pdf");
    }
}
