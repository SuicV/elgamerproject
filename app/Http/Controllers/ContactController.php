<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact ;
use Illuminate\Support\Facades\Validator ;
class ContactController extends Controller
{
    public function index(){
        return view("contact");
    }
    public function store(Request $req){
        $data = $req->only([
            "name",
            "email",
            "subject",
            "message"]);
        $validation = Validator::make($data , [
            "name"=>"required|min:4",
            "email"=>"required|email|max:255",
            "subject"=>"required|max:255",
            "message"=>"required|min:6"
        ]);
        if(!$validation->fails()){
            Contact::create($data);
            $req->session()->flash("success","votre message a bien ete enregisté");
            return back();
        }
        return back()->withErrors($validation);
    }
}
