<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $req){
        $informations = $req->only(["fullName","email","phone","address","rib"]);
        $custom = ["fullName.regex"=>"le nom compléte doit avoir deux mots et ne pas dépacer quatres mots",
                "phone.reuired"=>"Le champ telephone est obligatoire.",
                "phone.regex"=>"Le formate de telephone est invalid"] ;
        $validator =  Validator::make($informations, [
            "fullName"=>["required", "regex:/^(?>[a-z-]{1,30}\s?){2,4}$/i"],
            "email"=>["required","email"],
            "phone"=>["required","regex:/^(0|\+212)[1-9]([-\.]?[0-9]{2}){4}$/"],
            "address"=>["required","regex:/^(?>[a-z0-9-]+\s?){1,6}$/i"],
            "rib"=>["required", "regex:/^(?>\d{5}\s?){2}\s?\d{11}\s?\d{2}$/"]
        ],$custom);
        if(!$validator->fails()){
            // TODO : update user information if exist
            $client = Client::where("email","=",$informations["email"])->first();
            // create client if doesn't exist
            if($client === null){
                $client = Client::create($informations);
            }
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
        // redirect request with errors and old inputs
        return redirect(route("purchase",400))->withErrors($validator)
            ->withInput();
    }
}
