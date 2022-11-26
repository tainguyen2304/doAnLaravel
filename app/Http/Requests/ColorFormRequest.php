<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'code' => [
                'required',
                'string'
            ],
            // 'status' => [
            //     'nullable'
            // ],
        ];
    }
}