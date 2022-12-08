<?php

namespace App\Services;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

interface CarServiceInterface
{
    public function getAllRecords(): CarResource;

    public function storeRecord(Request $request): void;

    public function getSingleRecord(Car $car): array;

    public function deleteRecords(int $days): void;
}
