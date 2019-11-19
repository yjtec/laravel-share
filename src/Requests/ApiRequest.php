<?php

namespace Yjtec\LaravelShare\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->all();
        throw new HttpResponseException(
            response()->json([
                'errmsg'  => $validator->errors()->first(),
                'errcode' => 422,
            ])
        );
    }
}
