<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//追加
use Illuminate\Validation\Rule;

class StoreMember extends FormRequest
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

            //追加
            'name' => [
                'string',
                'required',
                'max:20'
            ],

            'telephone' => [
                'string',
                'nullable',
                'max:13',
                'unique:members'
            ],

            'email' => [
                'nullable',
                'max:255',
                'email',
                'unique:members'
            ]
        ];
    }
}
