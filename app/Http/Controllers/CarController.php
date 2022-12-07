<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Models\Car;
use App\Services\CarServiceInterface;

class CarController extends Controller
{
    private CarServiceInterface $carService;

    public function __construct(CarServiceInterface $carService){
        $this->carService = $carService;
    }

    public function index()
    {
        return $this->carService->getAllRecords();
    }

    public function store(StoreCarRequest $request)
    {
        $this->carService->storeRecord($request);

        return response()->json([
            'code' => 201,
            'message' => 'Record created successfully'
        ]);
    }

    public function show(Car $car)
    {
        $data = $this->carService->getSingleRecord($car);
        return response()->json([
            'code' => 200,
            'message' => 'Car with id '.$car->id.' fetched successfully',
            'data' => $data
        ]);
    }
}
