<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPhoto;
use Illuminate\Http\Request;


class CarPhotoController extends Controller
{
    public function index(Car $car)
    {
        $photos = $car->photos()->get();
        return response()->json($photos);
    }



    public function store(Request $request, Car $car)
    {

        //dd($request ->file('photo'));



        $request->validate([
        'photo' => 'required|image|max:2048'
    ]);
        $path = $request->file('photo')->store('car_photos', 'public'); // Сохранение файла

        $carPhoto = CarPhoto::create([
            'car_id' => $car->id,
            'photo' => $path,
]);


        //dd($carPhoto);
        return response()->json($carPhoto, 201);
    }
}
