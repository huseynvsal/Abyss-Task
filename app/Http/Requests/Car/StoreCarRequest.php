<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\ParentRequest;

class StoreCarRequest extends ParentRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:250',
            'file' => 'required|image|max:5000|mimes:jpg,bmp,png,jpeg,gif',
            'type' => 'required|integer|in:1,2,3'
        ];
    }
}
