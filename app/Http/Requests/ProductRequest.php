<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'bail|required|unique:products',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'status'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
        ];
    }
}
