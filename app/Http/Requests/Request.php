<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{

    public function authorize()
    {
        return false;
    }


    public function rules()
    {
        return [
//            'title' => 'require|min:3', //these are the html tag name (must be exactly the same as in html
//            'price' => 'require',
//            'from' => 'require',
//            'location'=> 'require',
//            'date' => 'require|date',
//            'description' => 'require'

        ];
    }
}
