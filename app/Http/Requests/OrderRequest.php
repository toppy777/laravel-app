<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class OrderRequest extends FormRequest
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
            "items" => "required|array",
            "items.*.id" => "required|integer",
            "items.*.quantity" => "required|integer",
            "name" => "required|string",
            "number" => "required|string",
            "zip_code" => "required|string",
            "address" => "required|string",
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
