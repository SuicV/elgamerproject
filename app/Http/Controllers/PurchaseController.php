<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF ;
use Illuminate\Support\Facades\Validator;
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
        $informations = $req->only(["fullName","email","telephone","address","rib"]);
        $custom = ["fullName.regex"=>"le nom compléte doit avoir deux mots et ne pas dépacer quatres mots",
                ] ;
        $validator =  Validator::make($informations, [
            "fullName"=>["required", "regex:/^(?>[a-z-]{1,}\s?){2,4}$/i"],
            "email"=>["required","email"],
            "telephone"=>["required","regex:/^(0|\+212)[1-9]([-. ]?[0-9]{2}){4}$/"],
            "address"=>["required","regex:/^(?>[a-z0-9-]+\s?){1,6}$/i"],
            "rib"=>["required", "regex:/^(?>\d{5}\s?){2}\s?\d{11}\s?\d{2}$/"]
        ],$custom);
        if(!$validator->fails()){
            dd("good request");
        }
        return redirect(route("purchase",400))->withErrors($validator)
            ->withInput();
    }
}
