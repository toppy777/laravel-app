<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ItemRequest extends FormRequest
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
            "photo" => "required|url",
            "name" => "required|string",
            "description" => "required|string",
            "price" => "required|integer"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $res = response(
            ["message" => "Bad Request"], 400
        );
        throw new HttpResponseException($res);
    }
}
