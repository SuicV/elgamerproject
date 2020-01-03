<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment ;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware("isAjax")->only("store");
    }

    public function store(Request $req){
        $validator = Validator::make($req->only("name","email","comment","p","rating"),[
            "name"=>["required","alpha_dash","max:255"],
            "email"=>["required", "email","max:255"],
            "comment"=>["required"],
            "rating"=>["required","numeric","min:1","max:5"],
            "p"=>["required","exists:products,id"]
        ]);
        if(!$validator->fails()){
            Comment::create(collect($req->only("name", "email", "comment", "rating"))
                    ->union(["product_id"=>$req->get("p")])->toArray()
            );
            return response(["status"=>"OK","html"=>view("products.inc.comments",[
                    "comments"=>Comment::where("product_id","=",$req->get("p"))->orderBy("created_at","desc")->get()
                ])->render()
            ]);
        }
        return response(["errors"=> $validator->errors(),"action"=>"REFUSED"],400);
    }
}
