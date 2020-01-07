<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordClientValidator ;
class storeClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "fullName"=>["required", "regex:/^(?>[a-z-]{1,30}\s?){2,4}$/i"],
            "email"=>["required","email"],
            "phone"=>["required","regex:/^(0|\+212)[1-9]([-\.]?[0-9]{2}){4}$/"],
            "address"=>["required","regex:/^(?>[a-z0-9-]+\s?){1,6}$/i"],
            "rib"=>["required", "regex:/^(?>\d{5}\s?){2}\s?\d{11}\s?\d{2}$/"],
            "password"=>["required", new PasswordClientValidator($this->get("email"))]
        ];
    }

    public function messages(){
        return ["fullName.regex"=>"le nom compléte doit avoir deux mots et ne pas dépacer quatres mots",
        "fullName.required"=>"le nom compléte est obligatoire",
        "phone.reuired"=>"Le champ telephone est obligatoire",
        "phone.regex"=>"Le formate de telephone est invalid"];
        
    }
}
