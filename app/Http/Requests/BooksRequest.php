<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BooksRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3', //these are the html tag name (must be exactly the same as in html
            'price' => 'required',
            'from' => 'required',
            'location'=> 'required',
            'dates' => 'required|date'


        ];
    }
}
