<?php

namespace App\Http\Requests;

use App\Exceptions\AbyssException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new AbyssException($validator->getMessageBag()->first(), 422);
    }
}
