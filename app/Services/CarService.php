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

    public function getSingleRecord(Car $car): array{
        $tempUrl = $this->getTempUrl($car->file);

        $data = [
            'name' => $car->name,
            'description' => $car->description,
            'file' => $tempUrl,
            'type' => $car->type
        ];

        return $data;
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

    private function saveFileInPrivateFolder(Request $request): string
    {
        $file = $request->file('file');

        $filePath = Storage::put(null, $file, 'private');
        return $filePath;
    }

    private function getTempUrl(string $path): string{
        $tempUrl = Storage::disk('local')->temporaryUrl(
            $path, now()->addMinutes(10)
        );

        return $tempUrl;
    }
}
