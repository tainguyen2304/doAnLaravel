<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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


    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'string'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'brand' => [
                'required',
                'string',
            ],
            'small_description' => [
                'required',
                'string',
                'max:500'

            ],
            'description' => [
                'required',
                'string',
            ],
            'original_price' => [
                'required',
                'integer',
            ],
            'selling_price' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
            ],
            'trending' => [
                'nullable',
            ],
            'status' => [
                'nullable',
            ],
            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'required',
                'string',
                'max:255'
            ],

            'meta_description' => [
                'required',
                'string',
                'max:255'
            ],
            'image' => [
                'nullable',
                // 'image|mimes:jpg,jpeg,png',
            ],

        ];
    }
}