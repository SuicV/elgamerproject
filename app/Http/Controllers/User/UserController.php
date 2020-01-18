<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\Storage ;
use \Str ;
use \Image ;
class UserController extends Controller {

    public function __construct(){
        $this->middleware("auth");
    }

    public function get(){
        return view("user.dashboard");
    }

    public function store(Request $req){
        $data = $req->only("type");
        $user = Auth::user();
        $rules = [
            "type"=>["required","in:image,password,basics"],
        ];
        $validator = Validator::make($data, $rules);
        if(!$validator->fails()){
            switch ($data["type"]){
                case "password":
                    $new = $req->only("password","old_password","password_confirmation");
                    return $this->updatePassword($new);
                break;
                case "basics":
                    $new = $req->only("name");
                    $new["email"] = $req->get("email","");
                    return $this->updateBasics($new);
                break;
                case "image":
                    $new = $req->only("image");
                    return $this->updateImage($new, $req->file("image"));
                break;
            }
            
        }
        return response($validator->errors(), 400);
    }

    private function updatePassword($data){
        // validate passwords
        $rules = [
            "password"=>["required", "min:8","max:255"],
            "password_confirmation"=>["required","same:password", "min:8","max:255"],
            "old_password"=>["required", "min:8","max:255"]
        ];
        $validator = Validator::make($data, $rules);
        if(!$validator->fails()){
            if( Hash::check( $data["old_password"], Auth::user()->password) ){
                $newPassword =Hash::make($data["password"]);
                Auth::user()->update( ["password" => $newPassword] );
                return response(["status"=>"ok","message"=>"mot de pass a bien ete changer"]);
            }
            return response(["old_password"=>"mot de pass est incorect"],400);
        }
        return response($validator->errors(),400);
    }
    
    private function updateBasics($data){
        $rules = [
            "name"=>["required","min:4","max:255"],
            "email"=>["required","email"]
        ];
        if($data["email"] !== Auth::user()->email){
            $rules["email"][] = "unique:user,email";
        }
        $validator = Validator::make( $data, $rules);
        if(!$validator->fails()){
            Auth::user()->update($data);
            return response(["status"=>"OK","message"=>"information a bien été changer"]);
        }
        return response($validator->errors(),400);
    }

    private function updateImage($data, $file){
        // validate image
        
        $rules = [
            "image"=>["required","file","mimes:png,jpeg,jpg"]
        ];

        $validator = Validator::make($data, $rules);
        
        if(!$validator->fails()){
            $fileName = Auth::user()->id."-".Str::random(10).".".$file->extension();
            if(($deleteFile = Auth::user()->image)!= null){
                Storage::delete("imgs/users/".$deleteFile);
            }
            $image = Image::make($file->path());
            $image->resize(600, 600, function ($constraint) {

            })->save('imgs/users/'.$fileName);
            Auth::user()->update(["image"=>$fileName]);
            
            return response(["status"=>"ok","filename"=>$fileName],200);
        }

        return response($validator->errors(), 400);
    }
}