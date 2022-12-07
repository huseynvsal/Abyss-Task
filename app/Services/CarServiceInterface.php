<?php

namespace App\Services;

use App\Http\Resources\CarResource;
use Illuminate\Http\Request;

interface CarServiceInterface
{
    public function getAllRecords(): CarResource;

    public function storeRecord(Request $request): void;

    public function getSingleRecord();
}
