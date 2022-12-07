<?php

namespace App\Services;

use App\Exceptions\AbyssException;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarService implements CarServiceInterface
{
    public function getAllRecords(): CarResource
    {
        $cars = Car::select('name', 'description', 'type')->paginate(10);
        return new CarResource($cars);
    }

    public function storeRecord(Request $request): void{
        try {
            $this->saveDataInDB($request);
        }catch (\Exception $exception){
            // here we can write actual error to Sentry
            throw new AbyssException('Unable to store records', 400);
        }

    }

    public function getSingleRecord(){

    }

    private function saveDataInDB(Request $request){
        $filePath = $this->saveFileInPrivateFolder($request);

        $car = new Car();
        $car->name = $request->name;
        $car->description = $request->description;
        $car->file = $filePath;
        $car->type = $request->type;
        $car->save();
    }

    private function saveFileInPrivateFolder(Request $request): bool
    {
        $filePath = now()->addHours(4) . '/' . $request->ip();
        $file = $request->file('file');
        $filePath = Storage::put($filePath, $file, 'private');
        return $filePath;
    }
}
