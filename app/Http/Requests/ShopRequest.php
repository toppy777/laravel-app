<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShopRequest extends FormRequest
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
            "opening_time" => "required|date_format:H:i",
            "closing_time" => "required|date_format:H:i",
            "price_range" => "required|integer",
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
