<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CarResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'Records fetched successfully',
            'data' => $this->collection
        ];
    }
}
