<?php

namespace App\Services;

use Illuminate\Http\Request;

interface CarServiceInterface
{
    public function getAllRecords();

    public function storeRecord(Request $request): void;

    public function getSingleRecord();
}
