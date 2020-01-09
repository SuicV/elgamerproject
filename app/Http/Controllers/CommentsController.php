<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment ;
use \App\Product ;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware("isAjax")->only("store","get");
    }
    
    public function get($id, Request $req){
        $comments = Comment::where("product_id","=",$id)->orderBy("created_at","desc")->paginate(6);
        return [
            "status"=>"OK",
            "html"=>view("products.inc.comments",compact("comments"))->render(),
        ];
    }

    public function store(Request $req){
        $validator = Validator::make($req->only("name","email","comment","p","rating"),[
            "name"=>["required","regex:/^(?>[a-z-]{1,30}\s?){2,4}$/i","max:255"],
            "email"=>["required", "email","max:255"],
            "comment"=>["required"],
            "rating"=>["required","numeric","min:1","max:5"],
            "p"=>["required","exists:products,id"]
        ]);
        if(!$validator->fails()){
            // add comment to comments table
            Comment::create(collect($req->only("name", "email", "comment", "rating"))
                    ->union(["product_id"=>$req->get("p")])->toArray()
            );
            $comments = Comment::where("product_id","=",$req->get("p"))
                ->orderBy("created_at","desc")
                ->paginate(6);
            $product = Product::where("id","=",$req->get("p"))->first();
            return response([
                "status"=>"OK",
                "rate"=>view("products.inc.statistics", compact("product"))->render(),
            ]);
        }
        return response(["errors"=> $validator->errors(),"action"=>"REFUSED"],400);
    }
}
