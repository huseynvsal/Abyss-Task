<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Services\CarServiceInterface;

class CarController extends Controller
{
    private CarServiceInterface $carService;

    public function __construct(CarServiceInterface $carService){
        $this->carService = $carService;
    }

    public function index()
    {

    }

    public function store(StoreCarRequest $request)
    {
        $this->carService->storeRecord($request);

        return response()->json([
            'code' => 200,
            'message' => 'Record stored successfully'
        ]);
    }

    public function show($id)
    {
        //
    }
}
