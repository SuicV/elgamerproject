<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment ;
class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware("isAjax")->only("store");
    }

    public function store(){

    }
}
